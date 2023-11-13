<!DOCTYPE html>
<html>
<head>
    <title>Make Complaints</title>
    <style>
        /* Add CSS to make the textarea non-resizable and adjust its size */
        #complaint_text {
            resize: none;
            width: 400px; /* Set the width to your desired value, for example, 400px */
            height: 200px; /* Set the height to your desired value, for example, 200px */
        }
    </style>
    <script>
        function showMessage(message) {
            alert(message); // Display a JavaScript alert with the message
        }
    </script>
</head>
<body>
    <h1>Make a Complaint</h1>

    <?= form_open(base_url('index.php?patient/make_complaints'), 'onsubmit="showMessage(\'Complaint submitted!\')"'); ?>
    <div>
        <label for="staff_reported">Staff Reported:</label>
        <select id="staff_reported" name="staff_reported">
            <option value="">Select a staff</option>
            <?php
                $staffs = array(
                    'doctor' => $this->db->get('doctor')->result(),
                    'nurse' => $this->db->get('nurse')->result(),
                    'pharmacist' => $this->db->get('pharmacist')->result(),
                );
                
                $idMapping = array(
                    'doctor' => 'doctor_id',
                    'nurse' => 'nurse_id',
                    'pharmacist' => 'pharmacist_id',
                );

                foreach ($staffs as $staff => $staffs_list):
            ?>
            <optgroup label="<?= ucfirst($staff) ?>">
                <?php foreach ($staffs_list as $staffprof): ?>
                    <option value="<?= $staffprof->name; ?>:<?= $staff; ?>:<?= $staffprof->$idMapping[$staff]; ?>">
                        <?= $staffprof->name; ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="complaint_text">Complaint:</label>
        <textarea id="complaint_text" name="complaint_text" placeholder="Enter your complaint"></textarea>
    </div>

    <!-- Add the hidden input fields to capture staff information -->
    <input type="hidden" name="staff_name" id="staff_name" value="">
    <input type="hidden" name="staff_profession" id="staff_profession" value="">
    <input type="hidden" name="staff_id" id="staff_id" value="">

    <div>
        <input type="hidden" name="complaint_submitted" value="1">
        <input type="submit" value="Submit Complaint">
    </div>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
    </form>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var staffReportedSelect = document.getElementById("staff_reported");
            var staffNameInput = document.getElementById("staff_name");
            var staffProfessionInput = document.getElementById("staff_profession");
            var staffIdInput = document.getElementById("staff_id");
    
            staffReportedSelect.addEventListener("change", function () {
                var selectedOption = staffReportedSelect.options[staffReportedSelect.selectedIndex];
                var optionValue = selectedOption.value.split(":");
    
                var staffName = optionValue[0];
                var staffProfession = optionValue[1];
                var staffId = optionValue[2];
    
                // Log the values to the JavaScript console
                console.log("Staff Name: " + staffName);
                console.log("Staff Profession: " + staffProfession);
                console.log("Staff ID: " + staffId);
    
                // Set the values in the hidden input fields
                staffNameInput.value = staffName;
                staffProfessionInput.value = staffProfession;
                staffIdInput.value = staffId;
            });
        });
    </script>
</body>
</html>
