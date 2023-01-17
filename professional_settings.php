<?php
@session_start();
require_once("includes/db.php");
if (!isset($_SESSION['seller_user_name'])) {
    echo "<script>window.open('login','_self')</script>";
}

if (isset($_POST['submit_professional'])) {

    $occupations = $input->post("occupation");
    $inserted = 0;
    // OCCUPATIONS
    if (count($occupations) > 0) {
        foreach ($occupations as $key => $occupation) {
            $form = [];
            $form['category_id'] = $occupation['category_id'];
            $form['start_date'] = $occupation['start_date'];
            $form['end_date'] = $occupation['end_date'];
            $form['status'] = 0;
            $form['seller_id'] = $login_seller_id;

            $insertForm = $db->insert("seller_pro_info", $form);
            if ($insertForm) {
                $newId = $db->lastInsertId();
                $options = isset($occupation['option_id']) ? $occupation['option_id'] : false;

                if ($options) {
                    foreach ($options as $j => $option) {
                        $optionForm = ["seller_pro_info_id" => $newId];
                        $optionForm['professional_info_id'] = $option;
                        $db->insert("seller_pro_info_options", $optionForm);
                        $inserted++;
                    }
                }
                $inserted++;
            }
        }
    }

    // SKILLS
    $formSkills = $input->post("skills");
    if (count($formSkills) > 0) {
        $skillsTotalAdded = $db->count("skills_relation", ["seller_id" => $login_seller_id]);
        $skillsTotalForm = count($formSkills);

        $skillsTotalCanAdd = $skillsTotalAdded > 0 ? $skillsTotalForm - $skillsTotalAdded : $skillsTotalForm;

        // If skills exceeds avaiable quota
        if ($skillsTotalCanAdd > $skills) {
            echo "<script>
              swal({
                type: 'warning',
                text: 'You no of skills quota exceeds.',
                timer: 3000,
                onOpen: function(){
                  swal.showLoading()
                }
              }).then(function(){
                // Read more about handling dismissals
                window.open('settings?professional_settings','_self');
              });
              </script>";
            exit();
        }

        $skillError = [];
        foreach ($formSkills as $key => $skill) {
            $skillId = $skill['id'];
            $skillLevel = $skill['level'];

            if ($skillId == "custom") {
                $skill_name = $input->post('skill_name');
                $count = $db->count("seller_skills", ["skill_title" => $skill_name]);

                if ($count == 1) {
                    $skillError = $lang['alert']['skill_already_added'];
                } else {
                    $insert_skill = $db->insert("seller_skills", array("skill_title" => $skill_name));
                    $skillId = $db->lastInsertId();
                    $inserted++;
                }
            } else {
                $skillCountAlready = $db->count("skills_relation", ["seller_id" => $login_seller_id, 'skill_id' => $skillId]);
                // Add only if new found
                if ($skillCountAlready == 0) {
                    $sForm = [
                        "skill_id" => $skillId,
                        "skill_level" => $skillLevel,
                        "seller_id" => $login_seller_id,
                    ];
                    $db->insert("skills_relation", $sForm);
                    $inserted++;
                }
            }
        }
    }

    if ($inserted > 0) {
        echo "<script>
              swal({
                type: 'success',
                text: 'Professional Info updated successfully!',
                timer: 3000,
                onOpen: function(){
                  swal.showLoading()
                }
              }).then(function(){
                // Read more about handling dismissals
                window.open('settings?professional_settings','_self');
              });
              </script>";
        exit();
    } else {
        echo "<script>
              swal({
                type: 'warning',
                text: 'Professional Info didnot updated.',
                timer: 3000,
                onOpen: function(){
                  swal.showLoading()
                }
              }).then(function(){
                // Read more about handling dismissals
                window.open('settings?professional_settings','_self');
              });
              </script>";
        exit();
    }
}

$qProInfo = $db->select("seller_pro_info", array("seller_id" => $login_seller_id));
$getProInfo = $qProInfo;
$cProInfo = $qProInfo->rowCount();

$formStatus = true;
$showPendingMsg = false;
$modificationMsg = '';
if ($cProInfo > 0) {
    $proInfoData = [];
    while ($oProInfo = $qProInfo->fetch()) {
        $proInfoData[] = $oProInfo;
        $proStatus = $oProInfo->status; // 1=active, 0=pending,2=modification
        $modificationMsg = $oProInfo->feedback;
        $formStatus = $proStatus == 2 ? true : false;
        if ($proStatus == 0)
            $showPendingMsg = true;
    }
}

$earliest_year = 1950;
$form_errors = Flash::render("form_errors");
$form_data = Flash::render("form_data");

if ($formStatus) : //Show Form if needs to
    if ($modificationMsg != '') {
?>
        <div class="alert alert-warning" role="alert">
            Modification Message From Admin:<br /><?= $modificationMsg ?>
        </div>
    <?php } ?>
    <form method="post" runat="server" autocomplete="off">
        <div class="form-group row">
            <label class="col-md-3 col-form-label"> <?= $lang['label']['occupation']; ?></label>
            <div class="col-md-9 p-0 m-0" id="clone-area">
                <div class="cloneArea">
                    <div class="form-row">
                        <div class="col-md-4 p-0 mb-3">
                            <label for="category_0">Category</label>
                            <select id="category_0" class="custom-select form-control category_change" name="occupation[0][category_id]" required>
                                <option value="">Choose category</option>
                                <?php
                                $qCategories = $db->select("categories", "", "DESC");
                                while ($oCategories = $qCategories->fetch()) {
                                    $category_meta = $db->select("cats_meta", array("cat_id" => $oCategories->cat_id))->fetch();
                                ?>
                                    <option value="<?= $oCategories->cat_id; ?>"><?= $category_meta->cat_title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="control-label" for="startdate_0">Start Date</label>
                            <select id="startdate_0" class="custom-select form-control" name="occupation[0][start_date]" required>
                                <option value="">Choose Start Date</option>
                                <?php
                                foreach (range(date('Y'), $earliest_year) as $x) {
                                ?>
                                    <option value="<?= $x; ?>"><?= $x; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="control-label" for="enddate_0">End Date</label>
                            <select id="enddate_0" class="custom-select form-control w-100" name="occupation[0][end_date]" required>
                                <option value="">Choose End Date</option>
                                <option value="present">Present</option>
                                <?php
                                foreach (range(date('Y'), $earliest_year) as $x) {
                                ?>
                                    <option value="<?= $x; ?>"><?= $x; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="responseArea_0">
                            Choose <b>at least one</b> of your best skills in <span id="categoryName">{Category Name}</span>
                            <div class="clearfix"></div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 offset-md-3">
                <a class="btn btn-primary btn-sm" id="add-more" href="javascript:;" role="button"><i class="fa fa-plus"></i> Add more occupation</a>
                <hr />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label"> <?= $lang['label']['skills']; ?> </label>
            <div class="col-md-9">
                <div class="row mb-2">
                    <div class="col w-100">
                        <select class="custom-select w-100" name="skill_id">
                            <option value=""><?= $lang['label']['select_skill']; ?></option>
                            <?php
                            $s_skills = array();
                            $get = $db->select("skills_relation", array("seller_id" => $login_seller_id));
                            while ($row = $get->fetch()) {
                                array_push($s_skills, $row->skill_id);
                            }

                            $s_skills = implode(",", $s_skills);

                            if (!empty($s_skills)) {
                                $query_where = "where not skill_id IN ($s_skills)";
                            } else {
                                $query_where = "";
                            }

                            $get_seller_skills = $db->query("select * from seller_skills $query_where");
                            while ($row_seller_skills = $get_seller_skills->fetch()) {
                                $skill_id = $row_seller_skills->skill_id;
                                $skill_title = $row_seller_skills->skill_title;
                            ?>
                                <option value="<?= $skill_id; ?>"> <?= $skill_title; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="custom-select w-100" name="skill_level">
                            <option value="" class="hidden"><?= $lang['label']['select_level']; ?></option>
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Expert</option>
                        </select>
                    </div>
                    <div class="col p-0 m-0">
                        <a href="javascript:;" class="btn btn-info" onclick="addSkill()">Add</a>
                    </div>
                </div>
                <?php

                ?>
                <table class="table table-striped" id="tblSkills">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Skills</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q_skills_relation = $db->select("skills_relation", array("seller_id" => $login_seller_id));
                        if ($q_skills_relation->rowCount() > 0) {
                            $i = 0;
                            while ($row_seller_skills = $q_skills_relation->fetch()) {

                                $relation_id = $row_seller_skills->relation_id;
                                $skill_id = $row_seller_skills->skill_id;
                                $skill_level = $row_seller_skills->skill_level;

                                $get_skill = $db->select("seller_skills", array("skill_id" => $skill_id));
                                $row_skill = $get_skill->fetch();
                                $skill_title = $row_skill->skill_title;
                        ?>
                                <tr>
                                    <th scope="row"><?= $skill_title; ?><input type="hidden" name="skills[<?= $i ?>][id]" value="<?= $skill_id; ?>"></th>
                                    <td><?= $skill_level; ?><input type="hidden" name="skills[<?= $i ?>][level]" value="<?= $skill_level; ?>"> <a href="javascript:;" onclick="deleteThis(this)" class="text-danger"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr class="table-danger">
                                <th colspan="2" scope="row">0 Skill added, please use above form to add your skillsets.</th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <small class="text-muted">Note: Please press "Save Changes" button to save the changes.</small>
            </div>
        </div>

        <hr>
        <button type="submit" name="submit_professional" class="btn btn-success <?= $floatRight ?>" style="<?= ($lang_dir == "right" ? 'margin-left: 110px;' : '') ?>">
            <i class="fa fa-floppy-o"></i> <?= $lang['button']['save_changes']; ?>
        </button>
    </form>
<?php else : ?>
    <div class="row">
        <?php if ($showPendingMsg) { ?>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Your latest Professional Info update request is in pending state. After approval, this message will disappear.
                </div>
            </div>
        <?php } ?>
        <div class="col-md-3">
            <?= $lang['label']['occupation']; ?>
        </div>
        <div class="col-md-9">
            <?php if ($cProInfo > 0) {
                foreach ($proInfoData as $proRow) {
                    // dump($proRow);
                    $proInfoId = $proRow->id;
                    $categoryId = $proRow->category_id;
                    $qCategory = $db->select("cats_meta", array("cat_id" => $categoryId, "language_id" => 1));
                    $oCategory = $qCategory->fetch();
                    $catTitle = $oCategory->cat_title;

                    $qOptions = $db->select("seller_pro_info_options", array("seller_pro_info_id" => $proInfoId));
                    $cOptions = $qOptions->rowCount();

            ?>
                    <div class="d-flex align-items-start flex-column border border-info mb-1">
                        <div class="p-2">
                            <b><?= $catTitle ?></b> <small class="text-muted"><?= $proRow->start_date ?>-<?= $proRow->end_date ?></small>
                        </div>
                        <?php if ($cOptions > 0) : ?>
                            <div class="p-2">
                                <?php
                                while ($oOption = $qOptions->fetch()) {
                                    $professional_info_id = $oOption->professional_info_id;
                                    $qProInf = $db->select("professional_info", array("id" => $professional_info_id));
                                    $oProInf = $qProInf->fetch();
                                    $oProInfTitle = $oProInf->title;
                                ?>
                                    <span class="badge badge-dark"><?= $oProInfTitle ?></span>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>
            <?php
                }
            } //$cProInfo
            ?>
        </div>
        <div class="col-md-12">
            <hr />
        </div>
        <div class="col-md-3">
            <?= $lang['label']['skills']; ?>
        </div>
        <div class="col-md-9">
            <table class="table table-striped" id="tblSkills">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Skills</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q_skills_relation = $db->select("skills_relation", array("seller_id" => $login_seller_id));
                    if ($q_skills_relation->rowCount() > 0) {
                        $i = 0;
                        while ($row_seller_skills = $q_skills_relation->fetch()) {

                            $relation_id = $row_seller_skills->relation_id;
                            $skill_id = $row_seller_skills->skill_id;
                            $skill_level = $row_seller_skills->skill_level;

                            $get_skill = $db->select("seller_skills", array("skill_id" => $skill_id));
                            $row_skill = $get_skill->fetch();
                            $skill_title = $row_skill->skill_title;
                    ?>
                            <tr>
                                <th scope="row"><?= $skill_title; ?></th>
                                <td><?= $skill_level; ?></td>
                            </tr>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <tr class="table-danger">
                            <th colspan="2" scope="row">0 Skill added, please use above form to add your skillsets.</th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<script src="<?= $site_url ?>/js/cloneData.js" type="text/javascript"></script>
<script>
    var totalSkillsAvailable = <?= $skills ?>;
    $('a#add-more').cloneData({
        mainContainerId: 'clone-area', // Main container Should be ID
        cloneContainer: 'cloneArea', // Which you want to clone
        removeButtonClass: 'remove-item', // Remove button for remove cloned HTML
        removeConfirm: true, // default true confirm before delete clone item
        removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message
        append: '<a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger remove-social-media">Remove</a>', // Set extra HTML append to clone HTML
        minLimit: 1, // Default 1 set minimum clone HTML required
        maxLimit: 5, // Default unlimited or set maximum limit of clone HTML
        defaultRender: 1,
        init: function() {
            // console.info(':: Initialize Plugin ::');
        },
        beforeRender: function() {
            // console.info(':: Before rendered callback called');
        },
        afterRender: function() {
            // console.info(':: After rendered callback called');
            //$(".selectpicker").selectpicker('refresh');
        },
        afterRemove: function() {
            // console.warn(':: After remove callback called');
        },
        beforeRemove: function() {
            // console.warn(':: Before remove callback called');
        }

    });

    $(document).on('change', 'select.category_change', function() {
        var categoryId = $(this).val();
        var selectId = this.id.match(/\d+/); // 123456
        var optionSelected = $(this).find("option:selected");
        var textSelected = optionSelected.text();

        var ajxReq = $.ajax({
            url: '<?= $site_url ?>/ajax/get-data',
            dataType: 'json',
            method: "POST",
            data: {
                categoryId,
                action: "get-category-option",
            },
            beforeSend: function(jqXHR) {
                $('body #wait').addClass("loader");
                $("#responseArea_" + selectId + "").removeClass("d-none").addClass("d-block")
                $("#responseArea_" + selectId + " span#categoryName").text(textSelected)
            }
        }).done(function(data, status, jqXhr) {
            if (data.result) {
                var buffer = '';
                for (var i = 0; i < data.data.length; i++) {
                    buffer += '<div class="col-4">';
                    buffer += '<div class="form-check">';
                    buffer += '<input class="form-check-input" name="occupation[' + selectId + '][option_id][]" type="checkbox" value="' + data.data[i].id + '" id="optionCheck-' + i + '" required onclick="deRequire(' + selectId + ')">';
                    buffer += '<label class="form-check-label" for="optionCheck-' + i + '">' + data.data[i].title + '</label>'
                    buffer += '</div>';
                    buffer += '</div>';
                }
                $("#responseArea_" + selectId + " .row").html(buffer)
            } else {
                $("#responseArea_" + selectId + " .row").html("<div class='col'><div class='alert alert-danger' role='alert'>" + data.data.error + "</div></div>")
            }
            $('body #wait').removeClass("loader");
        });
    });

    function deRequire(index) {
        var requiredCheckboxes = $("#responseArea_" + index + " .row :checkbox[required]");

        requiredCheckboxes.change(function() {
            if (requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    }

    function addSkill() {
        var skillSelectedId = $('select[name=skill_id]').find(":selected").val();
        var skillSelectedValue = $('select[name=skill_id]').find(":selected").text();
        var levelSelectedId = $('select[name=skill_level]').find(":selected").val();
        var levelSelectedValue = $('select[name=skill_level]').find(":selected").text();
        // alert(optionSelectedId)
        if (skillSelectedId === '') {
            alert("Please select skill");
            $('select[name=skill_id]').focus();
            return false
        }

        if (levelSelectedId === '') {
            alert("Please select skill level");
            $('select[name=skill_level]').focus();
            return false
        }

        $(".table-danger").remove();
        var trCount = $('#tblSkills tbody tr').length;
        var trNewCount = $('#tblSkills tbody tr.new').length;
        // alert(trNewCount + " " + totalSkillsAvailable)
        if (trNewCount === totalSkillsAvailable) {
            alert("You have exceeded the available skills number.")
            return false;
        }
        var index = trCount;
        // if (trCount > 1)
        // index = trCount - 1;
        var buffer = '<tr class="new">';
        buffer += '<th scope="row">' + skillSelectedValue + '<input type="hidden" name="skills[' + index + '][id]" value="' + skillSelectedId + '"></th>';
        buffer += '<td>' + levelSelectedValue + '<input type="hidden" name="skills[' + index + '][level]" value="' + levelSelectedValue + '"> <a href="javascript:;" onclick="deleteThis(this)" class="text-danger"><i class="fa fa-trash-o"></i></a></td>'
        buffer += '</tr>';
        $('#tblSkills tbody').append(buffer);

        $("select[name=skill_id] :selected").remove();
        $('select[name=skill_id]').prop('selectedIndex', 0);
        $('select[name=skill_level]').prop('selectedIndex', 0);
        return false;
    }

    function deleteThis(btn) {
        if (confirm("Are you sure want to delete this?")) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    }
</script>