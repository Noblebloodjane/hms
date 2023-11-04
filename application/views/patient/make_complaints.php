<!DOCTYPE html>
<html>
<head>
    <title>Make Complaints</title>
</head>
<body>
    <h1>Make a Complaint</h1>

    <?php if ($this->session->flashdata('flash_message')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('flash_message'); ?>
        </div>
    <?php endif; ?>

    <?= form_open(base_url('index.php?patient/make_complaints')); ?>
        <div>
            <!-- You can include any additional form fields if needed -->
        </div>

        <div>
            <input type="hidden" name="complaint_submitted" value="1">
            <input type="submit" value="Submit Complaint">
        </div>
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
    </form>
</body>
</html>
