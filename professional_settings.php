<?php
@session_start();
require_once("includes/db.php");
if (!isset($_SESSION['seller_user_name'])) {
    echo "<script>window.open('login','_self')</script>";
}
?>


<?php
if (isset($_POST['experience_add'])) {

    $job_title = $_POST['job_title'];
    $organization = $_POST['organization'];
    $start_from = $_POST['start_from'];
    $still_working = $_POST['still_working'];
    $end_to = $_POST['end_to'];
    $description = $_POST['description'];
    $seller_id = $login_seller_id;

    $add_experience = $db->insert("past_experience", array("job_title" => $job_title, "organization" => $organization, "start_from" => $start_from, "still_working" => $still_working, "end_to" => $end_to, "description" => $description, "seller_id" =>  $seller_id));

    if ($add_experience) {
        echo "<p>Experience added successfully!</p>";
    } else {
        echo "<p>Failed to add experience. Please try again.</p>";
    }
}


?>

<!-- // /add experience -->
<style>
    #end_date_wrapper {
        display: block;
    }

    .form_for_pastexperience {
        border: 1px solid lightgrey;
        border-radius: 10px;
    }
</style>
<div class="form_for_pastexperience">
    <h4 class="text-center">Past Experience</h4>
    <form method="post" autocomplete="on">
        <label for="job_title" class="col-md-3">Job Title</label>
        <input type="text" class="col-md-6" name="job_title" id="job_title">
        <br>
        <label for="organization" class="col-md-3">Organization Name</label>
        <input type="text" class="col-md-6" name="organization" id="organization">
        <br>
        <label for="start_from" class="col-md-3">From</label>
        <input type="date" class="col-md-6" name="start_from" id="start_from">
        <br>
        <label for="still_working" class="col-md-3">I am still working</label>
        <input type="checkbox" class="col-md-6" name="still_working" id="still_working">
        <br>
        <div id="end_date_wrapper">
            <label for="end_to" class="col-md-3">To</label>
            <input type="date" class="col-md-6" name="end_to" id="end_to">
        </div>
        <br>
        <label for="description" class="col-md-3">Work Experience</label>
        <textarea name="description" class="col-md-6" id="description"></textarea>
        <br>
        <button type="submit" name="experience_add">Submit</button>
    </form>
</div>


<script>
    const still_workingCheckbox = document.getElementById('still_working');
    const endDateWrapper = document.getElementById('end_date_wrapper');

    still_workingCheckbox.addEventListener('change', function() {
        if (this.checked) {
            endDateWrapper.style.display = 'none';
        } else {
            endDateWrapper.style.display = 'block';
        }
    });

    // Check the initial state of the checkbox to set the correct visibility on page load
    if (still_workingCheckbox.checked) {
        endDateWrapper.style.display = 'none';
    } else {
        endDateWrapper.style.display = 'block';
    }
</script>
<!--  -->
<style>
    .img-thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 5px;
        position: relative;
    }

    .remove-img {
        cursor: pointer;
        color: red;
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 20px;
        background: white;
        border-radius: 50%;
        padding: 2px;
    }

    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
    }

    .limit-message {
        color: red;
    }
</style>
</head>

<body>
    <div class="container mt-5">
        <h2>Add to Portfolio</h2>
        <form id="portfolioForm" action="submit_portfolio.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="projectTitle">Project Title</label>
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="projectskills">Skills</label>
                    <input type="text" class="form-control" id="projectskills" placeholder="Enter skills and press Enter" required>
                    <div id="skillsContainer" class="mt-2">
                        <!-- Tags will be appended here -->
                    </div>
                    <small id="tagLimitMessage" class="limit-message"></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="images">Upload Images (Max 3)</label>
                    <input type="file" class="form-control-file" id="imageUpload" name="images[]" accept="image/*" multiple>
                    <div id="imagePreview" class="image-preview-container mt-2">
                        <!-- Image previews will be appended here -->
                    </div>
                    <small id="imageLimitMessage" class="limit-message"></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="videos">Add Video URLs (Max 3)</label>
                    <input type="text" class="form-control" id="videoUrl" placeholder="Enter video URL and press Enter">
                    <div id="videoList" class="mt-2">
                        <!-- Video URLs will be appended here -->
                    </div>
                    <small id="videoLimitMessage" class="limit-message"></small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const maxTags = 5; // Maximum number of tags
        const maxImages = 3; // Maximum number of images
        const maxVideos = 3; // Maximum number of videos

        // Handle tag input
        document.getElementById('projectskills').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const input = e.target;
                const value = input.value.trim();
                const skillsContainer = document.getElementById('skillsContainer');
                const tagLimitMessage = document.getElementById('tagLimitMessage');
                const currentTagCount = skillsContainer.getElementsByClassName('tag').length;

                if (value) {
                    if (currentTagCount < maxTags) {
                        const tag = document.createElement('span');
                        tag.className = 'tag';
                        tag.textContent = value;
                        skillsContainer.appendChild(tag);
                        input.value = '';
                        tagLimitMessage.textContent = '';
                    } else {
                        tagLimitMessage.textContent = `You can only add up to ${maxTags} tags.`;
                    }
                }
            }
        });

        // Handle image upload
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const files = e.target.files;
            const imagePreview = document.getElementById('imagePreview');
            const imageLimitMessage = document.getElementById('imageLimitMessage');
            const existingImages = imagePreview.getElementsByClassName('img-thumbnail').length;

            if (files.length + existingImages > maxImages) {
                imageLimitMessage.textContent = `You can only upload up to ${maxImages} images.`;
                return;
            }

            imageLimitMessage.textContent = ''; // Clear any previous error messages
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'position-relative';

                    const img = document.createElement('img');
                    img.className = 'img-thumbnail';
                    img.file = file;
                    imgContainer.appendChild(img);

                    const removeBtn = document.createElement('span');
                    removeBtn.className = 'remove-img';
                    removeBtn.textContent = '×';
                    removeBtn.onclick = function() {
                        imgContainer.remove();
                        const fileInput = document.getElementById('imageUpload');
                        const dataTransfer = new DataTransfer();
                        Array.from(fileInput.files).forEach(f => {
                            if (f !== file) dataTransfer.items.add(f);
                        });
                        fileInput.files = dataTransfer.files;
                    };
                    imgContainer.appendChild(removeBtn);

                    imagePreview.appendChild(imgContainer);

                    const reader = new FileReader();
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    })(img);
                    reader.readAsDataURL(file);
                }
            });
        });

        // Handle video URL input
        document.getElementById('videoUrl').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const value = e.target.value.trim();
                const videoList = document.getElementById('videoList');
                const videoLimitMessage = document.getElementById('videoLimitMessage');
                const currentVideoCount = videoList.getElementsByClassName('media-item').length;

                if (value) {
                    if (currentVideoCount < maxVideos) {
                        const videoItem = document.createElement('div');
                        videoItem.className = 'media-item';
                        videoItem.textContent = value;
                        videoList.appendChild(videoItem);
                        e.target.value = '';
                        videoLimitMessage.textContent = '';
                    } else {
                        videoLimitMessage.textContent = `You can only add up to ${maxVideos} videos.`;
                    }
                }
            }
        });
    </script>
    <!--  -->
    <!-- skills -->
    <?php
    if (isset($_POST['submit_professional'])) {


        $form_status = $input->post("form_status");
        $inserted = 0;



        // SKILLS
        $formSkills = $_POST['skills'];
        $skill_cat_id = $_POST['skill_cat_id'];
        $skill_child_id = $_POST['skill_child_id'];
        $skill_sub_child_id = $_POST['skill_sub_child_id'];

        //     echo "<pre>";
        //     print_r($skill_cat_id);
        //     echo "</pre>";
        // exit();
        if (count($formSkills) > 0) {
            $skillsTotalAdded = $db->count("skills_relation", ["seller_id" => $login_seller_id]);
            $skillsTotalForm = count($formSkills);

            $skillsTotalCanAdd = $skillsTotalAdded > 0 ? $skillsTotalForm - $skillsTotalAdded : $skillsTotalForm;

            // If skills exceeds avaiable quota
            if ($skillsTotalCanAdd > $skills) {
                echo "<script>
              swal({
                type: 'warning',
                text: 'Available No of skills quota exceeds.',
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
            $formSkills = $_POST['skills'];
            foreach ($formSkills as $key => $skill) {
                $skillId = $skill['id'];
                $skillLevel = $skill['level'];
                $cat_id = $skill_cat_id;
                $child_id = $skill_child_id;
                $sub_child_id = $skill_sub_child_id;

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
                            "skill_cat_id" => $cat_id,
                            "skill_child_id" => $child_id,
                            "skill_sub_child_id" => $sub_child_id
                        ];
                        $db->insert("skills_relation", $sForm);
                        $inserted++;
                    }
                }
            }
        }
    }



    $qProInfo = $db->select("seller_pro_info", array("seller_id" => $login_seller_id));
    $getProInfo = $qProInfo;
    $cProInfo = $qProInfo->rowCount();

    $formStatus = true;
    $showPendingMsg = false;
    $modificationMsg = '';
    $proStatus = null;
    if ($cProInfo > 0) {
        $proInfoData = [];
        while ($oProInfo = $qProInfo->fetch()) {
            $proInfoData[] = $oProInfo;
            $proStatus = $oProInfo->status; // 1=active, 0=pending,2=modification
            $modificationMsg = $oProInfo->feedback;
            // $formStatus = $proStatus == 2 ? true : false;
            if ($proStatus == 0) {
                $showPendingMsg = true;
                $formStatus = false;
            }
        }
    }

    $totalProInfForm = $cProInfo > 0 ? $cProInfo : 1;

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
        <?php if ($proStatus == 1) { ?>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    Your Professional Info is active.
                </div>
            </div>
        <?php } ?>


        <form method="post" runat="server" autocomplete="off">

            <style>
                #custom_input_skill_add {
                    width: 100%;
                    padding: 6px;
                    border-radius: 3px;
                    border: 1px solid lightgrey;
                }

                #custom_input_skill_add:focus {
                    border: 1px solid lightblue;
                    /* Border style on focus */
                    outline: none;
                    /* Remove the default outline */
                }
            </style>
            <div class="form-group row">
                <label class="col-md-2 col-form-label"> <?= $lang['label']['skills']; ?> </label>
                <div class="col-md-10 pl-0">
                    <div class="row mb-2 pl-3">
                        <!-- category -->
                        <div class="col pl-0 ">
                            <select class="custom-select w-100" name="skill_cat_id" id="category_skills">
                                <option value="" class="hidden">
                                    <?= $lang['placeholder']['select_category']; ?>
                                </option>
                                <?php
                                $get_cats = $db->select("categories");
                                while ($row_cats = $get_cats->fetch()) {
                                    $cat_id = $row_cats->cat_id;
                                    $get_meta = $db->select("cats_meta", ["cat_id" => $cat_id, "language_id" => $siteLanguage]);
                                    $row_meta = $get_meta->fetch();
                                    $cat_title = $row_meta->cat_title;
                                ?>
                                    <option value="<?= $cat_id; ?>">
                                        <?= $cat_title; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- sub category -->
                        <div class="col pl-0 display-sub-none" style="display: none;">
                            <select class="custom-select w-100" name="skill_child_id" id="skill-sub-category">
                                <option value="select-sub-category" selected> Select A Sub Category</option>
                                <?php
                                $get_c_cats = $db->select("categories_children");
                                while ($row_c_cats = $get_c_cats->fetch()) {
                                    $child_id = $row_c_cats->child_id;
                                    $child_parent_id = $row_c_cats->child_parent_id;
                                    $get_meta = $db->select("child_cats_meta", array("child_id" => $child_id, "language_id" => $siteLanguage));
                                    $row_meta = $get_meta->fetch();
                                    $child_title = $row_meta->child_title;
                                ?>
                                    <option class="sub-category-option" data-parent="<?= $child_parent_id; ?>" value="<?= $child_id; ?>">
                                        <?= $child_title; ?><?= $child_id; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- sub-sub-category -->
                        <div class="col pl-0 display-sub-sub-none" style="display: none;">
                            <select class="form-control box-shadow-post-req" name="skill_sub_child_id" id="skil-sub-sub-category">
                                <option value="" class="hidden">
                                    <?= $lang['placeholder']['select_sub_sub_category']; ?>
                                </option>
                            </select>
                        </div>
                        <!-- skills -->

                        <div class="col pl-0 w-100 display-sub-skill-none" style="display: none;">
                            <select name="skill_id" id="custom_input_skill_add">
                                <option value="">select skill</option>
                            </select>
                        </div>

                        <!-- levels -->
                        <div class="col pl-0 display-sub-skill-none" style="display: none;">
                            <select class="custom-select w-100" name="skill_level">
                                <option value="" class="hidden"><?= $lang['label']['select_level']; ?></option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Expert</option>
                            </select>
                        </div>
                    </div>
                    <?php

                    ?>
                    <table class="table table-striped pl-0" id="tblSkills">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Sub category</th>
                                <th scope="col">Attribute</th>
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
                                    $skill_cat_id = $row_seller_skills->skill_cat_id;
                                    $skill_child_id = $row_seller_skills->skill_child_id;
                                    $skill_sub_child_id = $row_seller_skills->skill_sub_child_id;
                                    $relation_id = $row_seller_skills->relation_id;
                                    $skill_id = $row_seller_skills->skill_id;
                                    $skill_level = $row_seller_skills->skill_level;

                                    $get_skill = $db->select("seller_skills", array("skill_id" => $skill_id));
                                    $row_skill = $get_skill->fetch();
                                    $skill_title = $row_skill->skill_title;

                                    $get_skill_category = $db->select("cats_meta", array("cat_id" => $skill_cat_id));
                                    $row_skill_category = $get_skill_category->fetch();
                                    $skill_category_details = $row_skill_category->cat_title;

                                    $get_skill_sub_category = $db->select("child_cats_meta", array("child_id" => $skill_child_id));
                                    $row_skill_sub_category = $get_skill_sub_category->fetch();
                                    $skill_sub_category_details = $row_skill_sub_category->child_title;

                                    $get_skill_attribute = $db->select("sub_subcategories", array("attr_id" => $skill_sub_child_id));
                                    $row_skill_attribute = $get_skill_attribute->fetch();
                                    $skill_sub_subcategory = $row_skill_attribute->sub_subcategory_name;

                            ?>
                                    <tr>
                                        <td><?= $skill_category_details; ?></td>
                                        <td><?= $skill_sub_category_details; ?></td>
                                        <td><?= $skill_sub_subcategory ?></td>
                                        <th scope="row"><?= $skill_title; ?><input type="hidden" name="skills[<?= $i ?>][id]" value="<?= $skill_id; ?>"></th>
                                        <td><?= $skill_level; ?><input type="hidden" name="skills[<?= $i ?>][level]" value="<?= $skill_level; ?>">

                                            <a href="javascript:;" onclick="deleteSkill(<?= $relation_id; ?>)" class="text-primary"><i class="fa fa-trash-o"></i></a>
                                        </td>

                                    </tr>
                                <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr class="table-danger">
                                    <th colspan="2" scope="row">0 Skill added, please use above form to addss your skillsets.</th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="col p-0 m-0">
                        <a href="javascript:;" class="btn btn-info" onclick="addSkill()"><i class="fa fa-plus"></i> Add more skills</a>
                    </div>
                    <small class="text-muted">Note: Please press "Save Changes" button to save the changes.</small>
                </div>
            </div>

            <hr>
            <button type="submit" name="submit_professional" class="btn btn-success <?= $floatRight ?>" style="<?= ($lang_dir == "right" ? 'margin-left: 110px;' : '') ?>">
                <i class="fa fa-floppy-o"></i> <?= $lang['button']['save_changes']; ?>
            </button>
            <input type="hidden" name="form_status" value="<?= $proStatus ?>">
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
                        $subCategoryId = $proRow->sub_category_id;
                        $qCategory = $db->select("cats_meta", array("cat_id" => $categoryId, "language_id" => 1));
                        $oCategory = $qCategory->fetch();
                        $catTitle = $oCategory->cat_title;
                        $sbCategory = $db->select("child_cats_meta", array("child_id" => $subCategoryId, "language_id" => 1));
                        $bsCategory = $sbCategory->fetch();
                        $childTitle = $bsCategory->child_title;
                        $childId = $bsCategory->child_id;

                        $qOptions = $db->select("seller_pro_info_options", array("seller_pro_info_id" => $proInfoId));
                        $cOptions = $qOptions->rowCount();

                ?>
                        <div class="d-flex align-items-start flex-column border border-info mb-1">
                            <div class="p-2">
                                <b><?= $catTitle ?> - <?= $childTitle ?></b> - <small class="text-muted"><?= $proRow->start_date ?>-<?= $proRow->end_date ?></small>
                            </div>
                            <?php if ($cOptions > 0) : ?>
                                <div class="p-2">
                                    <?php
                                    while ($oOption = $qOptions->fetch()) {
                                        $professional_info_id = $oOption->professional_info_id;
                                        $qProInf = $db->select("professional_info", array("id" => $professional_info_id, "sub_category_id" => $childId));
                                        $oProInf = $qProInf->fetch();
                                        $oProInfTitle = $oProInf->title;
                                        $subcatids = $oProInf->sub_category_id;
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
                                <th colspan="2" scope="row">0 Skill added, please use above form to adds your skillsets.</th>
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
            excludeHTML: ".emptIt",
            init: function() {
                // Initialize Plugin
            },
            beforeRender: function() {
                // Before rendered callback called
            },
            afterRender: function() {
                // After rendered callback called
                $(".emptIt:last").addClass('d-none');

                // Update IDs for the newly cloned elements
                $('#clone-area .cloneArea').each(function(index) {
                    $(this).find('[id^=category_]').attr('id', 'category_' + index);
                    $(this).find('[id^=sub-category_]').attr('id', 'sub-category_' + index);
                    $(this).find('[id^=professional-info_]').attr('id', 'professional-info_' + index);
                });
            },
            afterRemove: function() {
                // After remove callback called
            },
            beforeRemove: function() {
                // Before remove callback called
            }
        });

        $(document).on('change', 'select.category_change', function() {
            var categoryId = $(this).val();
            var selectId = this.id.match(/\d+/); // Extract number from ID
            var optionSelected = $(this).find("option:selected");
            var textSelected = optionSelected.text();

            $.ajax({
                url: '<?= $site_url ?>/ajax/get-data',
                dataType: 'json',
                method: "POST",
                data: {
                    categoryId: categoryId,
                    action: "get-category-option"
                },
                beforeSend: function(jqXHR) {
                    $("#responseArea_" + selectId).removeClass("d-none").addClass("d-block");
                    $("#responseArea_" + selectId + " span#categoryName").text(textSelected);
                },
                success: function(response) {
                    // Update sub-category dropdown options
                    $('#sub-category_' + selectId).html(response.subCategories);
                }
            });
        });

        $(document).on('change', 'select.sub-category_change', function() {
            var subCategoryId = $(this).val();
            var selectId = this.id.match(/\d+/); // Extract number from ID

            $.ajax({
                url: '<?= $site_url ?>/ajax/get-sub-category-data',
                dataType: 'json',
                method: "POST",
                data: {
                    subCategoryId: subCategoryId,
                    action: "get-sub-category-option"
                },
                success: function(response) {
                    // Handle response if needed
                }
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
            buffer += '<td>' + levelSelectedValue + '<input type="hidden" name="skills[' + index + '][level]" value="' + levelSelectedValue + '"> <a href="javascript:;" onclick="deleteThis(this, null)" class="text-danger"><i class="fa fa-trash-o"></i></a></td>'
            buffer += '</tr>';
            $('#tblSkills tbody').append(buffer);

            $("select[name=skill_id] :selected").remove();
            $('select[name=skill_id]').prop('selectedIndex', 0);
            $('select[name=skill_level]').prop('selectedIndex', 0);
            return false;
        }

        function deleteThis(btn, id) {
            if (confirm("Are you sure want to delete this?")) {
                if (id != null) {
                    $('body #wait').addClass("loader");

                    $.ajax({
                        url: "<?= $site_url ?>/ajax/remove-data",
                        dataType: "json",
                        method: "POST",
                        data: {
                            id,
                            action: 'skills',
                        }
                    }).done(function(data) {
                        $('body #wait').removeClass("loader");
                        location.reload();
                    });
                }
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Handle category change to fetch sub-categories
            $(document).on('change', '[id^=category_]', function() {
                var categoryId = $(this).val();
                var elementId = $(this).attr('id');
                var idNumber = elementId.split('_')[1];

                $.ajax({
                    url: 'get_sub_categories', // Path to your PHP script
                    type: 'POST',
                    data: {
                        cat_id: categoryId
                    },
                    success: function(response) {
                        $('#sub-category_' + idNumber).html(response);
                    },
                    error: function() {
                        alert('Failed to fetch sub-categories.');
                    }
                });
            });




            // Handle sub-category change to fetch professional info
            $(document).on('change', '[id^=sub-category_]', function() {
                var subCatId = $(this).val();
                var elementId = $(this).attr('id');
                var idNumber = elementId.split('_')[1];
                var isEdit = $('#edit_mode_' + idNumber).val(); // Check if it's in edit mode

                $.ajax({
                    url: 'get_professional_info', // Update with the path to your new script
                    type: 'POST',
                    data: {
                        sub_cat_id: subCatId,
                        is_edit: isEdit // Pass edit mode flag
                    },
                    success: function(response) {
                        $('#professional-info_' + idNumber).html(response);
                    },
                    error: function() {
                        alert('Failed to fetch professional info.');
                    }
                });
            });
        });
    </script>


    <!-- sub category -->
    <script>
        function deleteSkill(relation_id) {
            if (confirm("Are you sure you want to delete this skill?")) {
                // $('body #wait').addClass("loader"); // Show loader or indication

                $.ajax({
                    url: "<?= $site_url ?>/ajax/delete-skill", // Path to your delete script
                    dataType: "json",
                    method: "POST",
                    data: {
                        id: relation_id, // Pass relation_id to identify which skill to delete
                        action: 'skills' // Action identifier, modify as needed
                    },
                    success: function(data) {
                        // $('body #wait').removeClass("loader"); // Remove loader or indication

                        if (data.result) {
                            // Skill deleted successfully, you can optionally update UI or reload the page
                            alert("Skill deleted successfully.");
                            location.reload(); // Reload the page or update UI as needed
                        } else {
                            alert("Failed to delete skill. Please try again.");
                        }
                    },
                    error: function() {
                        alert("Error occurred while deleting skill. Please try again.");
                    }
                });
            }
        }
    </script>

    <!-- skill section -->
    <script>
        $(document).ready(function() {
            $('#category_skills').change(function() {
                var skill_cat_id = $(this).val();
                $('.display-sub-none').hide();
                $('.display-sub-sub-none').hide();
                $('.display-sub-skill-none').hide();

                $.ajax({
                    url: 'skill_sub_categories',
                    method: 'POST',
                    data: {
                        skill_cat_id: skill_cat_id
                    },
                    success: function(response) {
                        $('.display-sub-none').show();
                        $('.display-sub-sub-none').hide();
                        $('.display-sub-skill-none').hide();
                        $('#skill-sub-category').html(response);
                        $('#skil-sub-sub-category').html('<option value="" class="hidden"><?= $lang['placeholder']['select_sub_sub_category']; ?></option>');

                    }
                });
            });

            $('#skill-sub-category').change(function() {
                var skill_child_id = $(this).val();
                $.ajax({
                    url: 'skill_sub_subcategories',
                    method: 'POST',
                    data: {
                        skill_child_id: skill_child_id
                    },
                    success: function(response) {
                        $('.display-sub-sub-none').show();
                        $('.display-sub-skill-none').hide();
                        $('#skil-sub-sub-category').html(response);
                    }
                });
            });

            $('#skil-sub-sub-category').change(function() {
                var skill_sub_child_id = $(this).val();
                $.ajax({
                    url: 'custom_input_skill_add',
                    method: 'POST',
                    data: {
                        skill_sub_child_id: skill_sub_child_id
                    },
                    success: function(response) {
                        $('.display-sub-skill-none').show();
                        $('#custom_input_skill_add').html(response);
                    }
                })
            });
        });
    </script>