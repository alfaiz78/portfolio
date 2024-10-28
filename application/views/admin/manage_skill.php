<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if (isset($skill)): ?>
                                Edit Skill
                            <?php else: ?>
                                Add Skill
                            <?php endif; ?>
                        </h5>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('skill/save_skill') ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<= isset($skill) ? $skill->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />




                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="<?= isset($skill) ? $skill->title : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Value</label>
                                <textarea name="value" class="form-control"
                                    required><?= isset($skill) ? $skill->value : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?= isset($skill) ? 'Update Skill' : 'Add Skill'; ?>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Existing skill List -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Existing skills</h2>
                        <div class="col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">skills List</h5>
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
        </div>
    </div>
</div>