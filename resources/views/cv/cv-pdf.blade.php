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
  /* Align items to the top */
  margin-bottom: 20px;
  /* Adjust this margin to control space below */
}

.name-info {
  text-align: left;
  top: -50px;
  position: relative;
  /* Position relative for precise alignment */
}

.contact-info {
  display: flex;
  /* Use flex to align items properly */
  flex-direction: column;
  /* Stack items vertically */
  gap: 10px;
  /* Space between items */
  text-align: right;
  margin: 0;
  /* Remove any margin */
  position: relative;
  top: -190px;
}

.contact-info p {
  margin: 0;
}

.contact-info a {
  color: #000;
  /* Change color to match your design */
  text-decoration: none;
}

.contact-info a:hover {
  text-decoration: underline;
}

.summer {
  margin-top: -150px;
}

.summer h2 {
  margin-top: -25px;
  /* Remove margin-top from heading */
}

.experience h3 {
  margin-top: -15px;
}
.Skills h2 {
  margin-bottom: 7px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
}

.Skills ul {
  margin-top: 0;
  padding-left: 20px; /* يمكنك تعديل هذا الرقم حسب التصميم المطلوب */
}
.Skills ul {
/* padding-left: 0; إلغاء الحشو الداخلي على القائمة */
list-style: disc inside; /* تحديد أن النقاط السوداء يجب أن تظهر داخل الـ <li> */
display: flex;
flex-wrap: wrap;
gap: 10px;
}

.Skills ul li {
display: inline-block;
width: calc(50% - 10px); /* لجعل كل عنصر يأخذ نصف عرض السطر */
vertical-align: top;
margin-bottom: -8px; /* إضافة مسافة أسفل كل عنصر */
box-sizing: border-box;
}
.name-info h1 {
margin-bottom: 7px; /* Reduce the space below the name */
}

.lan p {
margin-top: -4px;
margin-bottom: 5px; /* Reduce space below the first language entry */
}

.lan2 p {
margin-top: 0; /* Remove space above the second language entry */
}


.projects h2 {
margin-bottom: 10px; /* تقليل المسافة بين العنوان وعناصر القائمة */
}

.projects ul {
padding-left: 0; /* إزالة التباعد الافتراضي على اليسار للقائمة */
margin: 0; /* إزالة الهوامش الافتراضية */
}

.projects li {
margin-bottom: 5px; /* تقليل المسافة بين عناصر القائمة */
}

.projects h3 {
margin: 0; /* إزالة الهوامش حول عنصر h3 */
}

.projects h5, .projects p {
margin-top: 5px; /* تقليل المسافة بين h5 و p */
margin-bottom: 5px; /* تقليل المسافة بين p والعناصر التالية */
}

.projects span {
display: inline-block; /* يسمح باستخدام margin على اليمين */
margin-left: 20px; /* مقدار التباعد لتحريك النص لليمين */
}
ul {
margin-bottom: -3; /* إزالة المسافة السفلية */
padding-bottom: 0; /* إذا كان هناك أي حشوة سفلية */
}

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="name-info">
                <h1><strong>
                    @if(!empty($first_name))
                    {{ $first_name }}
                    @endif
                    <span>
                        @if(!empty($middel_name))
                        {{ $middel_name }}
                        @endif
                    </span><br>
                    @if(!empty($Family_name))
                    {{ $Family_name }}
                    @endif
                </strong></h1>
                <h3>
                    @if(!empty($career_job))
                    {{ $career_job }}
                    @endif
                </h3>
            </div>
            <div class="contact-info">
                @if(!empty($phone))
                <p><a href="tel:+{{ $phone }}">TEL: {{ $phone }}</a></p>
                @endif
                @if(!empty($county && $address))
                <p>Address: {{ $address }}, {{ $county }}</p>
                @endif
                @if(!empty($email))
                <p><a href="mailto:{{ $email }}">Email: {{ $email }}</a></p>
                @endif
                @if(!empty($linkedin))
                <p>LinkedIn: <a href="{{ $linkedin }}">{{ $linkedin }}</a>
                    @endif
                </p>
                @if(!empty($github))
                <p><a href="{{ $github }}">GitHub: {{ $github }}</a></p>
                @endif
            </div>
            <div class="summer">
                <h2>Summary : </h2>
                @if(!empty($Summary))
                <p><strong>{{ $Summary }}</strong></p>
                @endif
            </div>
        </div>
        <hr>
        <div class="experience">
            <h2>Experience : </h2>
            <div>
                <h3><strong>
                    @if(!empty($type_jop))
                    {{ $type_jop }}
                    @endif
                </strong><span>-</span><strong>
                    @if(!empty($company_name))
                    {{ $company_name }}
                    @endif
                </strong></h3>
                <p>
                    @if(!empty($start_date_month))
                    ( {{ $start_date_month }}
                    @endif
                    @if(!empty($start_date_year))
                    {{ $start_date_year }}
                    @endif - 
                    @if(!empty($end_date_month))
                    {{ $end_date_month }}
                    @endif
                    @if(!empty($end_date_year))
                    {{ $end_date_year }} )</p>
                    @endif
                @if(!empty($Job_summary))
                    <ul>
                        <li>{{ $Job_summary }}</li>
                    </ul>
                @endif
            </div>
            <br>
            @if(!empty($type_jop2))
            <div>
                <h3><strong>
                    @if(!empty($type_jop2))
                    {{ $type_jop2 }}
                    @endif
                    @if(!empty($company_name2))
                </strong><span>-</span><strong>
                    {{ $company_name2 }}
                </strong></h3>
                @endif
                <p>
                    @if(!empty($start_date_month2))
                    ( {{ $start_date_month2 }}
                    @endif
                    @if(!empty($start_date_year2))
                    {{ $start_date_year2 }} -
                    @endif
                    @if(!empty($end_date_month2))
                    {{ $end_date_month2 }}
                    @endif
                    @if(!empty($end_date_year2))
                    {{ $end_date_year2 }} )</p>
                    @endif
            
                @if(!empty($Job_summary2))
                    <ul>
                        <li>{{ $Job_summary2 }}</li>
                    </ul>
                @endif
            </div>
            @endif
            <br>
            @if(!empty($type_jop3))
            <div>
                <h3><strong>
                    @if(!empty($type_jop3))
                    {{ $type_jop3 }}
                    @endif
                    @if(!empty($company_name3))
                </strong><span>-</span><strong>
                    {{ $company_name3 }}
                </strong></h3>
                @endif
                <p>
                    @if(!empty($start_date_month3))
                    ( {{ $start_date_month3 }}
                    @endif
                    @if(!empty($start_date_year3))
                    {{ $start_date_year3 }} -
                    @endif
                    @if(!empty($end_date_month3))
                    {{ $end_date_month3 }}
                    @endif
                    @if(!empty($end_date_year3))
                    {{ $end_date_year3 }} )</p>
                    @endif
            
                @if(!empty($Job_summary3))
                    <ul>
                        <li>{{ $Job_summary3 }}</li>
                    </ul>
                @endif
            </div>
            @endif
        </div>
        <hr>
        <div class="projects">
            <h2>projects : </h2>
            <div>
                @if(!empty($project_name))
                <ul>
                    <li><h3>{{ $project_name }}</h3></li>
                </ul>
                @endif 
                @if (!empty($project_name))
                <h5><span> </span>Developed a {{ $project_name }} application featuring...</h5>
                @endif
                @if(!empty($skills_project))
                <p><span> </span><strong>Skills:</strong>{{ $skills_project }}</p>
                @endif
                @if(!empty($url_project))
                <p><span> </span>Repo Link : {{ $url_project }}</p>
                @endif
            </div>

            <div>
                @if(!empty($project_name2))
                <ul>
                    <li><h3>{{ $project_name2 }}</h3></li>
                </ul>
                @endif
                @if (!empty($project_name2))
                <h5><span> </span>Developed a {{ $project_name2 }} application featuring...</h5>
                @endif
                @if(!empty($skills_project2))
                <p><span> </span><strong>Skills:</strong>{{ $skills_project2 }}</p>
                @endif
                @if(!empty($url_project2))
                <p><span> </span>Repo Link : {{ $url_project2 }}</p>
                @endif
            </div>

            <div>
                @if(!empty($project_name3))
                <ul>
                    <li><h3>{{ $project_name3 }}</h3></li>
                </ul>
                @endif
                @if (!empty($project_name3))
                <h5><span> </span>Developed a {{ $project_name3 }} application featuring...</h5>
                @endif
                @if(!empty($skills_project3))
                <p><span> </span><strong>Skills:</strong>{{ $skills_project3 }}</p>
                @endif
                @if(!empty($url_project3))
                <p><span> </span>Repo Link : {{ $url_project3 }}</p>
                @endif
            </div>
        </div>
        <hr>
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
        <hr>
        <div class="education">
            <h2>Education : </h2>
            <div>
                @if(!empty($University_name) && !empty($start_date_month_university))
                <p><strong>INSTITUTE: </strong>{{ $University_name }} ({{ $start_date_month_university }} {{ $start_date_year_university }} - {{ $end_date_month_university }} {{ $end_date_year_university }})</p>
                @endif
                @if(!empty($MAJOR))
                <p><strong>MAJOR: </strong>{{ $MAJOR }}</p>
                @endif
                @if(!empty($university_year))
                <p><strong>year:</strong>{{ $university_year }}</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="languages">
            <h2>Languages </h2>
            <div class=lan>
                <p><strong>
                    @if(!empty($languages_name1))
                    • {{ $languages_name1 }}:
                    @endif
                </strong>
                    @if(!empty($language_level1))
                    {{ $language_level1 }}
                    @endif
                </p>
            </div>
            <div class='lan2'>
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
        
    </div>
</body>

</html>
