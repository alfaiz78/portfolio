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
            <!-- Heading Contact Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Heading Contact</h5>
                        <?php foreach ($hcontacts as $contact): ?>
                            <form method="post" action="<?= base_url('admin/update_hcontact/' . $contact->id) ?>"
                                enctype="multipart/form-data">


                                <!-- <input type="hidden" name="id" value="<php echo $contact->id; ?>"> -->
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                    value="<?= $this->security->get_csrf_hash(); ?>" />


                                <div class="form-group">
                                    <label for="Year">Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                        name="title" value="<?php echo $contact->title; ?>" placeholder="Enter title"
                                        required>
                                    <div class="invalid-feedback"><?php echo form_error('title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="Work">Background Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('bg_title') ? 'is-invalid' : ''; ?>"
                                        name="bg_title" value="<?php echo $contact->bg_title; ?>"
                                        placeholder="Enter background title" required>
                                    <div class="invalid-feedback"><?php echo form_error('bg_title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description"
                                        required><?php echo $contact->description; ?></textarea>
                                    <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"
                                        class="form-control <?php echo form_error('image') ? 'is-invalid' : ''; ?>"
                                        name="image" value="<?php echo $contact->image; ?>" placeholder="Enter image URL"
                                        required>
                                    <div class="invalid-feedback"><?php echo form_error('image'); ?></div>
                                    <?php if (isset($contacts) && $contact->image): ?>
                                        <img src="<?php echo base_url('/assets/uploads/contacts/' . $contact->image); ?>"
                                            width="100">
                                        <input type="hidden" name="existing_image" value="<?php echo $contact->image; ?>">
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Heading</button>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Add Contact Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Contact</h5>
                        <form method="post" action="<?php echo base_url('contact/add'); ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label for="Work">Icon</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('icon') ? 'is-invalid' : ''; ?>"
                                    name="icon" value="" placeholder="Enter icon name without class" required>
                            </div>

                            <div class="form-group">
                                <label for="University_name">Title</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                    name="title" value="" placeholder="Title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter description"
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Contact</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact List -->
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Icon Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($contacts)): ?>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($contacts as $contact): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $contact->icon; ?></td>
                                                <td><?php echo $contact->title; ?></td>
                                                <td><?php echo $contact->subtitle; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('contact/manage_contacts/' . $contact->id); ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $contact->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $contact->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $contact->id; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $contact->id; ?>">Delete Contact
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this contact?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('contact/delete_contact/' . $contact->id); ?>"
                                                                class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No contact found.</td>
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