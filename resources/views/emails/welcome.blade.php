@component('mail::message')
# Welcome to the Student Payment Center.
Starting today, you will be able to manage your student financial account at URBE University using our new Payment Platform.

Please use the following information to login.

- Site address: [https://myfs.urbe.university](https://myfs.urbe.university)
- Username: {{ $email }}
- Password: Your last name, followed by your birth year, followed by an exclamation sign. ( ie: **Lastname1987!** )

Should you have any questions, comments or concerns about paying for classes, or any other financial inquiries, please contact us.

Best,<br>
Bursar Office<br>
URBE University<br>
Email: bursar@urbe.university<br>
Phone: +1 (844) 744-8723

@endcomponent
