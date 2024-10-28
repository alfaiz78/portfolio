<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if (isset($contact)): ?>
                                Edit Contact
                            <?php else: ?>
                                Add Contact
                            <?php endif; ?>
                        </h5>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('contact/save_contact') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= isset($contact) ? $contact->id : ''; ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" id="icon" class="form-control" value="<?= isset($contact) ? htmlspecialchars($contact->icon) : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?= isset($contact) ? htmlspecialchars($contact->title) : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" required><?= isset($contact) ? htmlspecialchars($contact->subtitle) : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"><?= isset($contact) ? 'Update' : 'Add'; ?> Contact</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Existing Contact List -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Existing Contacts</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Icon</th>
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
                                                <td><?= $counter++; ?></td>
                                                <td><?= htmlspecialchars($contact->icon); ?></td>
                                                <td><?= htmlspecialchars($contact->title); ?></td>
                                                <td><?= htmlspecialchars($contact->subtitle); ?></td>
                                                <td>
                                                    <a href="<?= base_url('contact/manage_contacts/' . $contact->id); ?>" class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $contact->id; ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <!-- Modal for Deleting Contact -->
                                            <div class="modal fade custom-modal" id="deleteModal<?= $contact->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $contact->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title" id="deleteModalLabel<?= $contact->id; ?>">Delete Contact</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this contact?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="<?= base_url('contact/delete_contact/' . $contact->id); ?>" class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No contacts found.</td>
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
