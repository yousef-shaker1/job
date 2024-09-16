<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Youssef Ahmed Shaker</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  color: #000;
  background-color: #fff;
  margin: 0;
  padding: 20px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 20px;
}

.name-info h1 {
  margin: 0;
  text-transform: uppercase;
  font-size: 39px;
}

.name-info h3 {
  margin-top: 5px;
  font-size: 18px;
  font-weight: normal;
}
.name-info .adders {
  margin-top: -10px;
  margin-left: 50px;
  font-size: 18px;
  font-weight: normal;
}
.name-info .email {
  margin-top: -30px;
  font-size: 18px;
  font-weight: normal;
}


.contact-info {
text-align: right;
font-size: 14px;
margin-top: -140px; /* تعديل لرفع قسم الـ contact-info */
margin-bottom: 80px; /* تعديل لرفع قسم الـ contact-info */
}

.contact-info p {
margin: 2px 0;
}

hr {
  border: 0;
  border-top: 1px solid #000;
  margin: 10px 0;
}

.section-title {
  font-size: 20px;
  margin-bottom: 10px;
  margin-left: -40px;
  text-transform: uppercase;
  font-weight: bold;
}

.experience h3, .projects h3 {
  margin: 0;
  font-size: 16px;
  font-weight: bold;
}

.experience h3 {
  margin-left: 150px; /* حرك النص في العنوان ناحية اليمين */
  margin-bottom: 0px;
margin-top: -42px; /* حرك النص في العنوان ناحية اليمين */
}

.experience .data_ex {
  margin-left: -50px; /* حرك النص في العنوان ناحية اليمين */
}

.experience ul {
margin-left: 110px;
margin-bottom: 10px;
margin-top: 2px; /* حرك النص في العنوان ناحية اليمين */
/* margin-left: 30px; حرك القائمة ناحية اليمين */
}

.experience p, .projects p, .education p, .languages p {
  margin: 5px 0;
  font-size: 14px;
}

.projects p{
  margin-left: 20px;
}
.projects .pro{
  margin-left: 25px;
  margin-bottom: 5px;
}
.education p{
  margin-bottom: 10px;
}

.projects ul, .skills ul {
  list-style: disc;
  padding-left: 20px;
  margin: 5px 0;
}
.Skills h2 {
margin-bottom: 7px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
text-transform: uppercase;
margin-left: -35px;
margin-top: -5px;
}

.Skills ul {
margin-top: 0;
padding-left: 0; /* إزالة الحشو الداخلي على القائمة */
list-style: none; /* إزالة النقاط الافتراضية */
display: flex;
flex-wrap: wrap;
gap: 10px;
background-color:#ffffff; /* إزالة الخلفية */
margin-bottom: 10px;
}

.Skills ul li {
display: inline-block;
width: calc(50% - 10px); /* لجعل كل عنصر يأخذ نصف عرض السطر */
vertical-align: top;
margin-bottom: -8px; /* إضافة مسافة أسفل كل عنصر */
box-sizing: border-box;
background-color:#ffffff; 
}



    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="name-info">
                <h1>
                    @if(!empty($first_name)) {{ $first_name }} @endif
                    @if(!empty($middel_name)) {{ $middel_name }} @endif
                    @if(!empty($Family_name)) {{ $Family_name }} @endif
                </h1>
                <h3>
                    @if(!empty($career_job)) {{ $career_job }} @endif
                </h3>
                @if(!empty($address && $county)) <p>Address 
                    <br>
                    <div class='adders'>
                        {{ $address }} - {{ $county }}
                    </div>
                </p> @endif
                @if(!empty($phone)) <p>TEL: {{ $phone }}</p> @endif

                @if(!empty($email)) <div class='email'><p>Email: {{ $email }}</p></div> @endif
            </div>
            <div class="contact-info">
                @if(!empty($linkedin)) <p>LinkedIn: {{ $linkedin }}</p> @endif
                @if(!empty($github)) <p>GitHub: {{ $github }}</p> @endif
            </div>
        </div>
        <br>
        <div class="summer">
            @if(!empty($Summary))
            <p><strong>{{ $Summary }}</strong></p>
            @endif
        </div>
        <div class="experience">
            <div class="section-title">Experience</div>
            <div>
                <div class='data_ex'>
                <p>
                    @if(!empty($start_date_month)) ({{ $start_date_month }} @endif
                    @if(!empty($start_date_year)) {{ $start_date_year }} - @endif
                    @if(!empty($end_date_month)) {{ $end_date_month }} @endif
                    @if(!empty($end_date_year)) {{ $end_date_year }}) @endif
                </p>
            </div>
                <h3>
                    @if(!empty($type_jop)) {{ $type_jop }} @endif
                    @if(!empty($company_name)) - {{ $company_name }} @endif
                </h3>
                @if(!empty($Job_summary))
                <ul>
                    <li>{{ $Job_summary }}</li>
                </ul>
                @endif
            </div>
            <div>
                <div class='data_ex'>
                <p>
                    @if(!empty($start_date_month2)) ({{ $start_date_month2 }} @endif
                    @if(!empty($start_date_year2)) {{ $start_date_year2 }} - @endif
                    @if(!empty($end_date_month2)) {{ $end_date_month2 }} @endif
                    @if(!empty($end_date_year2)) {{ $end_date_year2 }}) @endif
                </p>
            </div>
                <h3>
                    @if(!empty($type_jop2)) {{ $type_jop2 }} @endif
                    @if(!empty($company_name2)) - {{ $company_name2 }} @endif
                </h3>
                @if(!empty($Job_summary2))
                <ul>
                    <li>{{ $Job_summary2 }}</li>
                </ul>
                @endif
            </div>
            <div>
                <div class='data_ex'>
                <p>
                    @if(!empty($start_date_month3)) ({{ $start_date_month3 }} @endif
                    @if(!empty($start_date_year3)) {{ $start_date_year3 }} - @endif
                    @if(!empty($end_date_month3)) {{ $end_date_month3 }} @endif
                    @if(!empty($end_date_year3)) {{ $end_date_year3 }}) @endif
                </p>
            </div>
                <h3>
                    @if(!empty($type_jop3)) {{ $type_jop3 }} @endif
                    @if(!empty($company_name3)) - {{ $company_name3 }} @endif
                </h3>
                @if(!empty($Job_summary3))
                <ul>
                    <li>{{ $Job_summary3 }}</li>
                </ul>
                @endif
            </div>
        </div>
        <div class="projects">
            <div class="section-title">Projects</div>
            <div >
                @if(!empty($project_name))
                <h3>• {{ $project_name }}</h3>
                <div>
                    <p>Developed a {{ $project_name }} application featuring...</p>
                @endif
                <div class='pro'>
                    <p><strong>Skills:</strong> {{ $skills_project }}</p>
                    <p>Repo Link: {{ $url_project }}</p>
                </div>
            </div>
            <div >
                @if(!empty($project_name2))
                <h3>• {{ $project_name2 }}</h3>
                <div>
                    <p>Developed a {{ $project_name2 }} application featuring...</p>
                @endif
                <div class='pro'>
                    @if(!empty($skills_project2))
                    <p><strong>Skills:</strong> 
                        {{ $skills_project2 }}
                        @endif
                    </p>
                    @if(!empty($url_project2))
                    <p>Repo Link: {{ $url_project2 }}</p>
                    @endif
                </div>
            </div>
            <div >
                @if(!empty($project_name3))
                <h3>• {{ $project_name3 }}</h3>
                <div>
                    <p>Developed a {{ $project_name3 }} application featuring...</p>
                @endif
                <div class='pro'>
                    @if(!empty($skills_project3))
                    <p><strong>Skills:</strong> 
                        {{ $skills_project3 }}
                        @endif
                    </p>
                    @if(!empty($url_project3))
                    <p>Repo Link: {{ $url_project3 }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="Skills">
            <h2>Skills : </h2>
            <div>
                <ul>
                    @if(!empty($skills))
                        @foreach($skills as $skill)
                            <li>• {{ $skill }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="education">
            <div class="section-title">Education</div>
            <div>
                <p><strong>INSTITUTE:</strong>
                    @if(!empty($University_name))
                    {{ $University_name }}
                    @endif
                    @if(!empty($start_date_month_university))
                    ({{ $start_date_month_university }} 
                    @endif
                    @if(!empty($start_date_year_university))
                    {{ $start_date_year_university }} - 
                    @endif
                    @if(!empty($end_date_month_university))
                    {{ $end_date_month_university }} 
                    @endif
                    @if(!empty($end_date_year_university))
                    {{ $end_date_year_university }})
                    @endif
                    </p>
                <p><strong>MAJOR:</strong> 
                    @if(!empty($MAJOR))
                    {{ $MAJOR }}
                    @endif
                </p>
            </div>
        </div>
        <div class="languages">
            <div class="section-title">Languages</div>
            <p><strong>
                @if(!empty($languages_name1))
                • {{ $languages_name1 }}:
                @endif
            </strong> 
            @if(!empty($languages_name1))
            {{ $language_level1 }}
            @endif
        </p>
            <p><strong>
                @if(!empty($language_name2))
                • {{ $language_name2 }}:
                @endif
            </strong>
            @if(!empty($language_level2))
             {{ $language_level2 }}
            @endif
            </p>
        </div>
    </div>
</body>

</html>
