<div class="box">

    <div class="box-header">

        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
                    <?php echo get_phrase('invoice_list');?>
                </a>
            </li>
        </ul>

        <!------CONTROL TABS END------->

    </div>

    <div class="box-content padded">

        <div class="tab-content">

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box active" id="list">

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo get_phrase('invoice_id');?></div></th>
                            <th><div><?php echo get_phrase('amount');?></div></th>
                            <th><div><?php echo get_phrase('patient');?></div></th>
                            <th><div><?php echo get_phrase('title');?></div></th>
                            <th><div><?php echo get_phrase('description');?></div></th>
                            <th><div><?php echo get_phrase('creation_timestamp');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('option');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($invoices as $row): ?>
                            <tr data-patient-name="<?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?>" 
                                data-patient-email="<?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'email'); ?>">
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['invoice_id'];?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name');?></td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
                                <td><span class="label label-<?php if($row['status']=='paid') echo 'green'; else echo 'dark-red'; ?>"><?php echo $row['status'];?></td>
                                <td align="center">
                                    <form id="paymentForm_<?php echo $row['invoice_id']; ?>" class="payment-form">
                                        <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id']; ?>" />
                                        <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>" />
                                        <input type="submit" class="btn btn-blue paystack-button" value="Pay with Paystack" />
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            <!----TABLE LISTING ENDS--->

        </div>

    </div>
	<script src="https://js.paystack.co/v1/inline.js"></script>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const paymentForms = document.querySelectorAll('.payment-form');

    paymentForms.forEach(function (form) {
        form.addEventListener("submit", payWithPaystack, false);
    });

    function payWithPaystack(e) {
        e.preventDefault();

        const row = e.target.closest('tr');
        const patientName = row.dataset.patientName;
        const patientEmail = row.dataset.patientEmail;

        let handler = PaystackPop.setup({
            key: 'pk_test_a5bd76365862aeb87c0178bbefae21070370f969', // Replace with your public key
            email: patientEmail,
            amount: e.target.querySelector("[name='amount']").value * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1),
            onClose: function () {
                alert('Window closed.');
            },
            callback: function (response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                sendSuccessMessage(response.reference, patientName);
                alert(message);
            }
        });

        handler.openIframe();
    }

    function sendSuccessMessage(reference, patientName) {
        // Make an AJAX request to your controller
        let xhr = new XMLHttpRequest();
		xhr.open("POST", "<?php echo base_url('index.php/patient/view_invoice'); ?>", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the controller if needed
                console.log(xhr.responseText);
            }
        };

        // Adjust the 'data' variable based on your requirements
        let data = "reference=" + reference + "&patientName=" + patientName;
        xhr.send(data);
    }
});
</script>
