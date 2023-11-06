<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/styles.css">
<title>Hospital Management System</title>
</head>
<body>
    <header>
        <h1>Hospital Management System</h1>
        <img src="template/images/hospital2.jpg" alt="Hospital Management System Image">

    </header>
    
    <section class="features">
        <h2>Why Choose Our System?</h2>
        <!-- Key Features -->
        <ul>
            <li>Patient Management: Easily organize and access patient records, including medical history, appointments, and billing information.</li>
            <li>Appointment Scheduling: A user-friendly calendar for scheduling, rescheduling, and managing appointments.</li>
            <li>Billing and Invoicing: Seamlessly generate invoices, process payments, and keep financial records.</li>
            <li>Staff Collaboration: Improve communication and coordination among healthcare professionals.</li>
            <li>Reporting and Analytics: Gain insights into hospital operations with comprehensive data analytics.</li>
        </ul>
    </section>
    
    <section class="benefits">
        <h2>Our Benefits</h2>
        <!-- Benefits List -->
        <ul>
            <li>Patient-Centric Care: Enhance patient experience by providing efficient and personalized care.</li>
            <li>Time and Cost Savings: Optimize hospital operations, reduce paperwork, and lower administrative costs.</li>
            <li>Data Security: Ensure the highest level of data security and HIPAA compliance.</li>
            <li>Scalability: Our system grows with your hospital's needs.</li>
        </ul>
    </section>
    
    <section class="testimonials">
        <h2>Testimonials</h2>
        <!-- Testimonials -->
        <blockquote>
            <p>"Since implementing this system, our hospital's efficiency has skyrocketed. It's truly a game-changer!"</p>
            <footer>- Dr. Smith, Chief Medical Officer</footer>
        </blockquote>
        <blockquote>
            <p>"The user-friendly interface and powerful features make this the best hospital management system we've used."</p>
            <footer>- Jane Doe, Office Manager</footer>
        </blockquote>
    </section>
    
    <section class="get-started">
        <h2>Get Started Today!</h2>
        <p>Ready to take your hospital to the next level? Contact us to schedule a demo and see how our Hospital Management System can transform your operations.</p>
        <a href="<?php echo base_url();?>index.php?login/logout" class="login-button">login</a>
    </section>
    
    <section class="about-us">
        <a href="about.html">Learn more about our company and mission to revolutionize healthcare management.</a>
    </section>
    
    <section class="blog">
        <a href="blog.html">Stay updated with the latest healthcare management trends and news.</a>
    </section>
    
    <section class="connect">
        <h2>Connect with Us</h2>
        <a href="#" class="social-link">Facebook</a>
        <a href="#" class="social-link">Twitter</a>
        <a href="#" class="social-link">LinkedIn</a>
    </section>
    
    <footer>
        <ul>
        <li><?php echo anchor('landing/privacy', 'Privacy Policy'); ?></li>
        <li><?php echo anchor('landing/terms', 'terms and conditions'); ?></li>
        </ul>
        <p>&copy; 2023 Your Hospital Management System</p>
    </footer>
</body>
</html>
