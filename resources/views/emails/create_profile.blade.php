<h1>Hello {{ $user->name }},</h1>
    <p>Thank you for signing up at [Job board]!</p>
    <p>We are excited to have you on board and look forward to helping you find opportunities that fit your needs. To create a personalized experience and improve your chances of finding a job, we invite you to create your profile.</p>
    
    <h2>Why Should You Create Your Profile?</h2>
    <ul>
        <li>Increase Job Opportunities: Your profile will be visible to employers looking for your skills.</li>
        <li>Access to Relevant Jobs: Browse jobs that match your interests and skills.</li>
        <li>Ongoing Updates: You can update your profile anytime to meet your needs.</li>
    </ul>

    <p><a href="{{ route('login_user') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block;">Create Your Profile</a></p>

    <p>If you have any questions, feel free to reach out to us. We're here to help!</p>

    <p>Thank you,</p>