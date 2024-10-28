
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Flash Messages for Success and Error -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="row mt-3">
            <!-- Hadding Rervice Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Heading Skill</h5>
                        <?php foreach ($hskills as $skill): ?>
                            <form method="post" action="<?php echo base_url('skill/update_skill'); ?>"
                                enctype="multipart/form-data">
                                <!-- <input type="hidden" name="id" value="<php echo isset($skill) ? $skill->id : ''; ?>"> -->
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                                <div class="form-group">
                                    <label for="Year">Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                        name="title"
                                        value="<?php echo isset($skill) ? $skill->title : set_value('title'); ?>"
                                        placeholder="Enter title" required>
                                    <div class="invalid-feedback"><?php echo form_error('title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="Work">Background Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('bg_title') ? 'is-invalid' : ''; ?>"
                                        name="bg_title"
                                        value="<?php echo isset($skill) ? $skill->bg_title : set_value('bg_title'); ?>"
                                        placeholder="Enter background title" required>
                                    <div class="invalid-feedback"><?php echo form_error('bg_title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description"
                                        required><?php echo isset($skill) ? $skill->description : ''; ?></textarea>
                                    <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary"><?php echo isset($skill) ? 'Update Hadding' : 'Add skill'; ?></button>

                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Add Rervice Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Skill</h5>
                        <form method="post" action="<?php echo base_url('skill/add'); ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<php echo isset($skill) ? $skill->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />



                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                    name="title" value="" placeholder="Title" required>

                            </div>

                            <div class="form-group">
                                <label for="value">Value</label>
                                <input class="form-control" name="value" placeholder="Enter Value"
                                    required>

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?php echo isset($skill) ? 'Update' : 'Add'; ?> skill
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- skill List -->
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Skills List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                        <th>S.no</th>
                                        <th>Title</th>
                                        <th>Values</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($skills)): ?>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($skills as $skill): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                
                                                <td><?php echo $skill->title; ?></td>
                                                <td><?php echo $skill->value; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('skill/manage_skills/' . $skill->id); ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $skill->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->

                                            <!-- Modal for Deleting skill -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $skill->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $skill->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $skill->id; ?>">Delete Skill
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this Skill?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('skill/delete_skill/' . $skill->id); ?>"
                                                                class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No skill found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>