<div class="card user-sidebar rounded-0 mb-4">
    <!--- card user-sidebar rounded-0 Starts -->

    <div class="card-body">
        <!-- card-body Starts -->

        <h3><?= $lang['user_profile']['description']; ?></h3>
        <p><?= $seller_about; ?></p>

        <hr class="card-hr">
        <h3 class="float-left"><?= $lang['user_profile']['languages']; ?></h3>

        <?php if (isset($_SESSION['seller_user_name'])) { ?>

            <?php if ($login_seller_user_name == $seller_user_name) { ?>

                <ul class="list-unstyled">
                    <!-- list-unstyled Starts -->

                    <li class="mb-4 clearfix">

                        <button data-toggle="collapse" data-target="#language" class="btn btn-success float-right">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> <?= $lang['button']['add_new']; ?>
                        </button>

                    </li>

                    <div id="language" class="collapse form-style mb-2">
                        <!-- language collapse form-style mb-2 Starts -->

                        <form method="post">
                            <!-- form Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <select class="form-control" name="language_id" required="">

                                    <option value=""><?= $lang['label']['select_language']; ?></option>

                                    <?php

                                    $s_langs = array();

                                    $get = $db->select("languages_relation", array("seller_id" => $login_seller_id));

                                    while ($row = $get->fetch()) {

                                        array_push($s_langs, $row->language_id);
                                    }

                                    $s_langs = implode(",", $s_langs);

                                    if (!empty($s_langs)) {
                                        $query_where = "where not language_id IN ($s_langs)";
                                    } else {
                                        $query_where = "";
                                    }

                                    $get_languages = $db->query("select * from seller_languages $query_where");

                                    while ($row_languages = $get_languages->fetch()) {

                                        $language_id = $row_languages->language_id;
                                        $language_title = $row_languages->language_title;

                                    ?>
                                        <option value="<?= $language_id; ?>"> <?= $language_title; ?> </option>
                                    <?php } ?>

                                    <option value="custom">Custom Language</option>

                                </select>

                            </div><!-- form-group Ends -->

                            <div class="form-group language-title d-none">
                                <!-- form-group Starts -->

                                <input type="text" placeholder="Language Name" class="form-control" name="language_title">

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <select class="form-control" name="language_level" required="">

                                    <option class="hidden"><?= $lang['label']['select_level']; ?></option>
                                    <option value="basic"> Basic</option>
                                    <option value="Fluent"> Fluent</option>
                                    <option value="Conversational"> Conversational</option>
                                    <option value="Native or Bilingual"> Native or Bilingual</option>

                                </select>

                            </div><!-- form-group Ends -->

                            <div class="text-center">
                                <!-- text-center Starts -->

                                <button type="button" data-toggle="collapse" data-target="#language" class="btn btn-secondary">
                                    <?= $lang['button']['cancel']; ?>
                                </button>

                                <button type="submit" name="insert_language" class="btn btn-success">
                                    <?= $lang['button']['add']; ?>
                                </button>

                            </div><!-- text-center Ends -->

                        </form><!-- form Ends -->

                        <?php

                        if (isset($_POST['insert_language'])) {

                            $language_id = $input->post('language_id');
                            $language_level = $input->post('language_level');

                            if ($language_id == "custom") {

                                $language_title = $input->post('language_title');

                                $count = $db->count("seller_languages", ["language_title" => $language_title]);

                                if ($count == 1) {

                                    echo "<script>alert('{$lang['alert']['language_already_added']}');</script>";
                                    echo "<script>window.open('$seller_user_name','_self');</script>";

                                    exit();
                                } else {

                                    $insert_language = $db->insert("seller_languages", ["language_title" => $language_title]);
                                    $language_id = $db->lastInsertId();
                                }
                            }

                            $insert_language = $db->insert("languages_relation", array("seller_id" => $seller_id, "language_id" => $language_id, "language_level" => $language_level));
                            echo "<script>window.open('$seller_user_name','_self');</script>";
                        }

                        ?>

                    </div><!-- language collapse form-style mb-2 Ends -->

                </ul><!-- list-unstyled Ends -->

            <?php } ?>

        <?php } ?>

        <div class="clearfix"></div>

        <ul class="list-unstyled mt-3">
            <!-- list-unstyled mt-3 Starts -->

            <?php

            $select_languages_relation = $db->select("languages_relation", array("seller_id" => $seller_id));

            while ($row_languages_relation = $select_languages_relation->fetch()) {

                $relation_id = $row_languages_relation->relation_id;
                $language_id = $row_languages_relation->language_id;
                $language_level = $row_languages_relation->language_level;


                $get_language = $db->select("seller_languages", array("language_id" => $language_id));
                $row_language = $get_language->fetch();
                $language_title = $row_language->language_title;

            ?>

                <li class="card-li mb-1">
                    <!--- card-li mb-1 Starts -->

                    <?= $language_title; ?> - <span class="text-muted"> <?= $language_level; ?> </span>

                    <?php if (isset($_SESSION['seller_user_name'])) { ?>

                        <?php if ($login_seller_user_name == $seller_user_name) { ?>

                            <a href="user.php?delete_language=<?= $relation_id; ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        <?php } ?>

                    <?php } ?>

                </li>
                <!--- card-li mb-1 Ends -->

            <?php } ?>

        </ul><!-- list-unstyled mt-3 Ends -->

        <hr class="card-hr">

        <h3 class="float-left"><?= $lang['user_profile']['skills']; ?></h3>

        <?php if (isset($_SESSION['seller_user_name'])) { ?>

            <?php
                if ($login_seller_user_name == $seller_user_name) {
                    $totalSkills = $row_plan_detail->skills;
                    // $select_skills_relation = $db->select("skills_relation", array("seller_id" => $seller_id));
                    $select_skills_relation = $db->query("select * from skills_relation WHERE seller_id='$seller_id'");
                    $totalAddedSkills = $select_skills_relation->rowCount();
                    // print("<pre>" . print_r([$totalAddedSkills, $totalSkills], true) . "</pre>");
                    // exit;
                    if ($totalAddedSkills < $totalSkills) {
            ?>

                <ul class="list-unstyled">
                    <!-- list-unstyled Starts -->

                    <li class="mb-4 clearfix">

                        <button data-toggle="collapse" data-target="#add_skill" class="btn btn-success float-right">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> <?= $lang['button']['add_new']; ?>
                        </button>

                    </li>

                    <div id="add_skill" class="collapse form-style mb-2">
                        <!-- add_skill collapse form-style mb-2 Starts -->

                        <form method="post">
                            <!-- form Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <select class="form-control" name="skill_id" required="">

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

                                    <option value="custom">Custom Skill</option>

                                </select>

                            </div><!-- form-group Ends -->

                            <div class="form-group skill-name d-none">
                                <!-- form-group Starts -->

                                <input type="text" placeholder="Skill Name" class="form-control" name="skill_name">

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <select class="form-control" name="skill_level" required="">

                                    <option value="" class="hidden"><?= $lang['label']['select_level']; ?></option>
                                    <option> Beginner</option>
                                    <option> Intermediate</option>
                                    <option> Expert</option>

                                </select>

                            </div><!-- form-group Ends -->

                            <div class="text-center">
                                <!-- text-center Starts -->

                                <button type="button" data-toggle="collapse" data-target="#add_skill" class="btn btn-secondary">
                                    <?= $lang['button']['cancel']; ?>
                                </button>

                                <button type="submit" name="insert_skill" class="btn btn-success">
                                    <?= $lang['button']['add']; ?>
                                </button>

                            </div><!-- text-center Ends -->

                        </form><!-- form Ends -->

                        <?php

                        if (isset($_POST['insert_skill'])) {

                            $skill_id = $input->post('skill_id');
                            $skill_level = $input->post('skill_level');
                            $skills_total = $db->count("skills_relation", ["seller_id" => $seller_id]);

                            if ($skill_id == "custom") {

                                $skill_name = $input->post('skill_name');
                                $count = $db->count("seller_skills", ["skill_title" => $skill_name]);
                                $skills_total = $db->count("skills_relation", ["seller_id" => $seller_id]);


                                if ($count == 1) {
                                    echo "<script>alert('{$lang['alert']['skill_already_added']}');</script>";
                                    echo "<script>window.open('$seller_user_name','_self');</script>";
                                    exit();
                                } else {
                                    $insert_skill = $db->insert("seller_skills", array("skill_title" => $skill_name));
                                    $skill_id = $db->lastInsertId();
                                }
                            }
                            if ($skills_total >= $num_of_skills) {

                                // echo "<script>alert('no more skill will be added')</script>";
                                echo "<script>alert('No More skills will be added you have only allowed $num_of_skills Skills and $skills_total')</script>";
                                echo "<script>window.open('$seller_user_name','_self');</script>";
                            } else {
                                /*echo "<script>alert('<?= $skills_total =?>')</script>";*/
                                $insert_skill = $db->insert("skills_relation", array("seller_id" => $seller_id, "skill_id" => $skill_id, "skill_level" => $skill_level));

                                echo "<script>window.open('$seller_user_name','_self');</script>";
                            }
                        }

                        ?>

                    </div><!-- language collapse form-style mb-2 Ends -->

                </ul><!-- list-unstyled Ends -->

                <?php
                    }
                }
                ?>

        <?php } ?>

        <div class="clearfix"></div>

        <ul class="list-unstyled mt-3">
            <!-- list-unstyled mt-3 Starts -->

            <?php

            $select_skills_relation = $db->select("skills_relation", array("seller_id" => $seller_id));
            while ($row_skills_relation = $select_skills_relation->fetch()) {

                $relation_id = $row_skills_relation->relation_id;
                $skill_id = $row_skills_relation->skill_id;
                $skill_level = $row_skills_relation->skill_level;

                $get_skill = $db->select("seller_skills", array("skill_id" => $skill_id));
                $row_skill = $get_skill->fetch();
                $skill_title = $row_skill->skill_title;

            ?>

                <li class="card-li mb-1">
                    <!--- card-li mb-1 Starts -->

                    <?= $skill_title; ?> - <span class="text-muted"> <?= $skill_level; ?> </span>

                    <?php if (isset($_SESSION['seller_user_name'])) { ?>

                        <?php if ($login_seller_user_name == $seller_user_name) { ?>

                            <a href="user.php?delete_skill=<?= $relation_id; ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        <?php } ?>

                    <?php } ?>

                </li>
                <!--- card-li mb-1 Ends -->

            <?php } ?>

        </ul><!-- list-unstyled mt-3 Ends -->
        <hr class="card-hr">

        <!--        // add qualification-->
        <h3 class="float-left"><?= $lang['user_profile']['qualification']; ?></h3>

        <?php if (isset($_SESSION['seller_user_name'])) { ?>

            <?php if ($login_seller_user_name == $seller_user_name) { ?>
                <ul class="list-unstyled">
                    <!-- list-unstyled Starts -->
                    <li class="mb-4 clearfix">

                        <button data-toggle="collapse" data-target="#add_education" class="btn btn-success float-right">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> <?= $lang['button']['add_new']; ?>
                        </button>

                    </li>
                    <div id="add_education" class="collapse form-style mb-2">
                        <!-- add_skill collapse form-style mb-2 Starts -->
                        <form method="post">
                            <!-- form Starts -->
                            <div class="form-group">
                                <select style="width:100%" name="country" id="country" class="form-control" data-placeholder="Select Country">
                                    <?php
                                    $countries = $db->query('SELECT * FROM `countries`');
                                    while ($country = $countries->fetch()) {
                                        echo '<option value="' . $country->id . '">' . $country->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width:100%" name="university" multiple id="university" class="form-control" data-placeholder="Select University">
                                    <?php
                                    $countries = $db->query('SELECT  distinct uninversity FROM education order by uninversity');
                                    while ($country = $countries->fetch()) {
                                        echo '<option value="' . $country->uninversity . '">' . $country->uninversity . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group">
                                <!-- form-group Starts -->
                                <div class="col-xs-12 col-sm-4 no-padding" style="padding:0;">
                                    <select style="width:100%" class="form-control" id="degree_title" name="degree_title" required="">
                                        <option value=""><?= $lang['label']['degree_title']; ?></option>
                                        <option value="0" class="hidden">Title</option>
                                        <option value="associate">Associate</option>
                                        <option value="certificate">Certificate</option>
                                        <option value="ba">B.A.</option>
                                        <option value="barch">BArch</option>
                                        <option value="bm">BM</option>
                                        <option value="bfa">BFA</option>
                                        <option value="bsc">B.Sc.</option>
                                        <option value="ma">M.A.</option>
                                        <option value="mba">M.B.A.</option>
                                        <option value="mfa">MFA</option>
                                        <option value="msc">M.Sc.</option>
                                        <option value="jd">J.D.</option>
                                        <option value="md">M.D.</option>
                                        <option value="phd">Ph.D</option>
                                        <option value="llb">LLB</option>
                                        <option value="llm">LLM</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-8 no-padding" style="padding:0;">
                                    <select multiple style="width:100%" class="form-control" id="degree" name="degree_name" required="">
                                        <?php
                                        $countries = $db->query('SELECT distinct name FROM education order by name');
                                        while ($country = $countries->fetch()) {
                                            echo '<option value="' . $country->name . '">' . $country->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><!-- form-group Ends -->
                            <br>
                            <div class="form-group">
                                <select style="width:100%" name="year_of_graduation" id="year_of_graduation" class="form-control" data-placeholder="Select Year">
                                    <?php
                                    for ($i = 1960; $i <= date('Y'); $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                                <br>

                                <div class="text-center">
                                    <!-- text-center Starts -->

                                    <button type="button" data-toggle="collapse" data-target="#add_education" class="btn btn-secondary">
                                        <?= $lang['button']['cancel']; ?>
                                    </button>

                                    <button type="submit" name="insert_education" class="btn btn-success">
                                        <?= $lang['button']['add']; ?>
                                    </button>

                                </div><!-- text-center Ends -->

                        </form><!-- form Ends -->



                        <?php

                        if (isset($_POST['insert_skill'])) {

                            $skill_id = $input->post('skill_id');
                            $skill_level = $input->post('skill_level');
                            $skills_total = $db->count("skills_relation", ["seller_id" => $seller_id]);

                            if ($skill_id == "custom") {

                                $skill_name = $input->post('skill_name');
                                $count = $db->count("seller_skills", ["skill_title" => $skill_name]);
                                $skills_total = $db->count("skills_relation", ["seller_id" => $seller_id]);


                                if ($count == 1) {
                                    echo "<script>alert('{$lang['alert']['skill_already_added']}');</script>";
                                    echo "<script>window.open('$seller_user_name','_self');</script>";
                                    exit();
                                } else {
                                    $insert_skill = $db->insert("seller_skills", array("skill_title" => $skill_name));
                                    $skill_id = $db->lastInsertId();
                                }
                            }
                            if ($skills_total >= $num_of_skills) {

                                // echo "<script>alert('no more skill will be added')</script>";
                                echo "<script>alert('No More skills will be added you have only allowed $num_of_skills Skills and $skills_total')</script>";
                                echo "<script>window.open('$seller_user_name','_self');</script>";
                            } else {
                                /*echo "<script>alert('<?= $skills_total =?>')</script>";*/
                                $insert_skill = $db->insert("skills_relation", array("seller_id" => $seller_id, "skill_id" => $skill_id, "skill_level" => $skill_level));

                                echo "<script>window.open('$seller_user_name','_self');</script>";
                            }
                        }
                        if (isset($_POST['insert_education'])) {
                            $country = $input->post('country');
                            $country = $input->post('country');
                            $university = $input->post('university');
                            $degree_title = $input->post('degree_title');
                            $degree_name = $input->post('degree_name');
                            $year_of_graduation = $input->post('year_of_graduation');

                            $insert_skill = $db->insert("education", array(
                                "title" => $degree_title,
                                "name" => $degree_name,
                                "Country" => $country,
                                "uninversity" => $university,
                                "year" => $year_of_graduation,
                                "user_id" => $seller_id,
                                "created_at" => date()
                            ));
                            if ($insert_skill) {
                                echo '<script>alert("Education Added Successfully")</script>';
                            }
                        }

                        ?>

                    </div><!-- language collapse form-style mb-2 Ends -->
                </ul><!-- list-unstyled Ends -->
            <?php } ?>

        <?php } ?>
        <div class="clearfix"></div>
        <ul class="list-unstyled mt-3">
            <!-- list-unstyled mt-3 Starts -->

            <?php

            $select_skills_relation = $db->select("education", array("user_id" => $seller_id));
            while ($row_skills_relation = $select_skills_relation->fetch()) {

                $relation_id = $row_skills_relation->country;

                $get_country = $db->select("countries", array("id" => $relation_id));
                $gcountry = $get_country->fetch();

            ?>

                <li class="card-li mb-1">
                    <!--- card-li mb-1 Starts -->

                    <?= $row_skills_relation->year ?> - <span class="text-muted"> <?= $row_skills_relation->uninversity . ' ,' . $gcountry->name; ?> </span><br>
                    <span class="text-muted"><?php echo strtoupper($row_skills_relation->title) . ' ' . $row_skills_relation->name; ?> </span>

                    <?php if (isset($_SESSION['seller_user_name'])) { ?>

                        <?php if ($login_seller_user_name == $seller_user_name) { ?>

                            <a href="user.php?delete_education=<?= $row_skills_relation->id; ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>

                        <?php } ?>

                    <?php } ?>

                </li>
                <!--- card-li mb-1 Ends -->

            <?php } ?>

        </ul><!-- list-unstyled mt-3 Ends -->
        <hr class="card-hr">

        <!--        end add qualification-->
    </div><!-- card-body Ends -->

</div>
<!--- card user-sidebar rounded-0 Ends -->
<?php
if (isset($_GET['delete_education'])) {
    $delete_skill_id = $input->get('delete_education');
    $delete_skill = $db->delete("education", array("id" => $delete_skill_id, "user_id" => $login_seller_id));
    if ($delete_skill->rowCount() == 1) {
        echo "<script>alert('One education has been deleted.')</script>";
        echo "<script> window.open('$login_seller_user_name','_self') </script>";
    } else {
        echo "<script> window.open('$login_seller_user_name','_self') </script>";
    }
}
