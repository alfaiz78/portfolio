<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Flash Messages for Success and Error -->
        <?php if ($this->session->flashdata('nerror')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('nerror'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('nsuccess')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('nsuccess'); ?>
            </div>
        <?php endif; ?>

        <div class="row mt-3">
            <!-- Add/Edit Navbar Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo isset($navbar_item) ? 'Edit' : 'Add'; ?> Navbar</h5>
                        <form method="post"
                            action="<?php echo isset($navbar_item) ? base_url('navbar/update/' . $navbar_item->id) : base_url('navbar/add'); ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<?php echo isset($navbar_item) ? $navbar_item->id : ''; ?>"> -->

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                    name="title"
                                    value="<?php echo isset($navbar_item) ? $navbar_item->title : set_value('title'); ?>"
                                    placeholder="Enter title" required>
                                <div class="invalid-feedback"><?php echo form_error('title'); ?></div>
                            </div>

                            <div class="form-group">
                                <label for="Link">Link</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('link') ? 'is-invalid' : ''; ?>"
                                    name="link"
                                    value="<?php echo isset($navbar_item) ? $navbar_item->link : set_value('link'); ?>"
                                    placeholder="Enter link" required>
                                <div class="invalid-feedback"><?php echo form_error('link'); ?></div>
                            </div>

                            <button type="submit"
                                class="btn btn-primary"><?php echo isset($navbar_item) ? 'Update' : 'Add'; ?>
                                Navbar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Navbar List Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Navbar List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($navbar)): ?>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($navbar as $nav): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $nav->title; ?></td>
                                                <td><?php echo $nav->link; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('navbar/edit/' . $nav->id); ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $nav->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $nav->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $nav->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $nav->id; ?>">Delete Navbar</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this Navbar item?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('navbar/delete/' . $nav->id); ?>"
                                                                class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No navbar items found.</td>
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
            <!-- Add Link Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Add Link</h3>
                        <form action="<?= base_url('admin/add-link'); ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>">

                            <div class="form-group">
                                <label for="icon">Link Icon:</label>
                                <input type="text" class="form-control" name="icon" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Link URL:</label>
                                <input type="url" class="form-control" name="link" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Link</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Existing Links Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Manage Links</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Icon</th>
                                        <th>Link URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($links)): ?>
                                        <?php $counter = 1; ?>
                                        <?php foreach ($links as $link): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo htmlspecialchars($link->icon); ?></td>
                                                <td><?php echo htmlspecialchars($link->link); ?></td>
                                                <td>
                                                    <!-- Edit Button to Open Modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editModal<?php echo $link->id; ?>">Edit</button>

                                                    <!-- Delete Button to Open Modal -->
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $link->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal for Each Link -->
                                            <div id="theme-container" class="bg-theme">
                                            <div class="modal fade custom-modal" id="editModal<?php echo $link->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="editModalLabel<?php echo $link->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="editModalLabel<?php echo $link->id; ?>">Edit Link</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card" >
                                                            <div class="card-body " style="background: rgb(164,183,190);
background: linear-gradient(117deg, rgba(164,183,190,1) 0%, rgba(193,124,132,0.8323704481792717) 100%);">
                                                                <form 
                                                                    action="<?= base_url('admin/update-link/' . $link->id); ?>"
                                                                    method="post">
                                                                    <input type="hidden"
                                                                        name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                        value="<?= $this->security->get_csrf_hash(); ?>">
                                                                    <div class="modal-body custom-modal-body">
                                                                        <div class="form-group">
                                                                            <label for="icon">Link Icon:</label>
                                                                            <input type="text" class="form-control" name="icon"
                                                                                value="<?= htmlspecialchars($link->icon); ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="link">Link URL:</label>
                                                                            <input type="url" class="form-control" name="link"
                                                                                value="<?= htmlspecialchars($link->link); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer custom-modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $link->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $link->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $link->id; ?>">Delete Link</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this link?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="<?= base_url('admin/delete-link/' . $link->id); ?>"
                                                                class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No links found.</td>
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


<div class="content-wrapper">
    <div class="container-fluid">
        <h3>Footer Settings</h3>
        
        <!-- Display success or error message -->
        <?php if ($this->session->flashdata('fsuccess')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('fsuccess'); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('ferror')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('ferror'); ?>
            </div>
        <?php endif; ?>

        <?php foreach ($footer as $foter): ?>
            <form method="post" action="<?php echo base_url('admin/update-footer/' . $foter->id); ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="form-group">
                    <label for="title">Footer Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($foter->title); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Footer Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" value="<?php echo htmlspecialchars($foter->subtitle); ?>">
                </div>

                <button type="submit" class="btn btn-success">Update Footer</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>
