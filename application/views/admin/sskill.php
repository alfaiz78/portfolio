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
            <!-- Add/Edit Sskill Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo isset($sskill) ? 'Edit' : 'Add'; ?> Sskill</h5>
                        <form method="post" action="<?php echo isset($sskill) ? base_url('sskill/update/' . $sskill->id) : base_url('sskill/add'); ?>" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<php echo isset($sskill) ? $sskill->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>" name="title" value="<?php echo isset($sskill) ? $sskill->title : set_value('title'); ?>" placeholder="Enter title" required>
                                <div class="invalid-feedback"><?php echo form_error('title'); ?></div>
                            </div>

                            <div class="form-group">
                                <label for="Subtitle">Subtitle</label>
                                <input type="text" class="form-control <?php echo form_error('subtitle') ? 'is-invalid' : ''; ?>" name="subtitle" value="<?php echo isset($sskill) ? $sskill->subtitle : set_value('subtitle'); ?>" placeholder="Enter subtitle" required>
                                <div class="invalid-feedback"><?php echo form_error('subtitle'); ?></div>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo isset($sskill) ? 'Update' : 'Add'; ?> Sskill</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sskills List -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sskills List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($sskills)): ?>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($sskills as $sskill): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $sskill->title; ?></td>
                                                <td><?php echo $sskill->subtitle; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('sskill/edit/' . $sskill->id); ?>" class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $sskill->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $sskill->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $sskill->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title" id="deleteModalLabel<?php echo $sskill->id; ?>">Delete Sskill</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this Sskill?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('sskill/delete/' . $sskill->id); ?>" class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No sskills found.</td>
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
