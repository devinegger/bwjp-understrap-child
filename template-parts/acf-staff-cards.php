<?php 

/** 
 * Template Part for displaying ACF - Staff Cards
 */

$headline = get_sub_field('headline');
$staff_members = get_sub_field('staff_members');

?>


<section class="staff-cards">
    <div class="container">
        <div class="row py-5">
            <h3 class="text-info text-uppercase"><?= $headline; ?></h3>
            <?php foreach($staff_members as $member) : ?>
                <?php $name = $member['name']; ?>
                <?php $name_id = strtolower(str_replace(array(" ", ","), array("-", ""), $name)); ?>
                <?php $job_title = $member['job_title']; ?>
                <?php $pronouns = $member['pronouns']; ?>
                <?php $bio = $member['bio']; ?>
                <?php $image_arr = $member['image']; 
                    $image_ID = $image_arr['ID']; 
                    $image_URL = $image_arr['url']; 
                    $image_alt = $image_arr['alt']; 
                    $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'member-image img-fluid', 'alt'=>$image_alt) ); ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-info text-white">
                        <?= $image ?>
                        <h5 class="card-title text-uppercase text-center fs-3 pt-3">
                            <a href="#" class="text-decoration-none stretched-link text-white" data-bs-toggle="modal" data-bs-target="#<?= $name_id ?>">Meet <?= $name; ?></a>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="<?= $name_id ?>" tabindex="-1" aria-labelledby="<?= $name_id ?>Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-info text-white">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close bg-secondary text-info" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5 pt-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $image ?>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="mb-0 mt-1 fw-bold fs-3" id="<?= $name_id ?>Label"><?= $name ?></h3>
                                        <span class="pronouns">(<?= $pronouns ?>)</span>
                                        <h4 class="mb-2 fw-light fs-6"><?= $job_title ?></h4>
                                        <p class="mt-4"><?= $bio ?></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div><!-- .modal -->
            <?php endforeach; ?>
        </div>
    </div>
</section>

