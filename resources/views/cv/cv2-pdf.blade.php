<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Youssef Ahmed Shaker</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  color: #333;
  background-color: #ffffff; /* خلفية بيضاء */
  margin: 0;
  padding: 0;
  line-height: 1.6;
}

.container {
  max-width: 800px;
  background-color: #ffffff; /* خلفية بيضاء */
  padding: 20px;
  margin: 0 auto;
  border: none;
  box-shadow: none;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 2px solid #ffffff; /* خلفية بيضاء */
  padding-bottom: 10px;
  margin-bottom: 20px;
}

.name-info {
  position: relative;
  margin-top:-35px;
  margin-left: -55px; 
}

.name-info h1 {
  font-size: 28px;
  color: #00a4bd;
  margin: -4;
  margin-left: 8px; 
  text-transform: uppercase;
}

.name-info h3 {
  font-size: 18px;
  color: #666;
  margin: 0;
  margin-left: 8px; 
  text-transform: uppercase;
}

.contact-info {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.contact-info p {
  margin: 0;
}

.contact-info a {
  color: #0a0d0e;
  text-decoration: none;
}

.contact-info a:hover {
  text-decoration: underline;
}

h2 {
  color: #00a4bd;
  border-bottom: 2px solid #ffffff;
  padding-bottom: 5px;
  margin-bottom: 15px;
}

h3 {
  color: #333;
  margin-bottom: 5px;
}

h5 {
  color: #00a4bd;
  margin-top: 10px;
  margin-bottom: 5px;
}

p {
  margin-bottom: 10px;
}

ul {
  list-style: none;
  padding-left: 0;
  margin-bottom: 20px;
}

ul li {
  background-color: #f9f9f9;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.projects span {
  margin-left: 18px;
  color: #666;
}

.summary h2 {
  text-transform: uppercase;
  margin-left: -50px; 
  margin-top: -20px; 
}

.summary p {
  margin-top: -20px; 
}



.education {
margin-left: 50px;
margin-top: 20px;
}

.education h2 {
text-transform: uppercase;
margin-top: -50px; 
margin-left: -80px; 
font-size: 24px;
font-weight: bold;
margin-bottom: 5px;
text-align: left;
}

.education .dates {
font-size: 16px;
color: #555;
margin-left: -70px;
margin-top: -10px; /* التواريخ تحت "Education" مباشرة */
margin-bottom: 5px;
}

.education .university-info h3 {
font-size: 18px;
font-weight: bold;
margin-left: -20px;
margin-top: 5px; /* تقديم الجامعة والتخصص إلى الأسفل قليلاً */
display: flex;
justify-content: space-between;
align-items: flex-end; /* وضع النص بجانب التواريخ ولكن أسفل قليلاً */
}

.university-info h3 span {
margin-right: 15px; /* مسافة بين التخصص والجامعة */
}


.project-skills, .project-repo {
margin-top: -10px; /* رفع العناصر لأعلى قليلاً، يمكنك تعديل هذا الرقم حسب الحاجة */
}

.languages h2 {
text-transform: uppercase;
margin-left: -20px;
margin-top: 10px;
margin-bottom: -20px;
}
.experience {
    margin-left: 20px; /* تقليل المسافة الجانبية من اليسار لتكون أكثر توازنًا */
    margin-top: 20px;
}

.experience h2 {
    text-transform: uppercase;
    margin-left: -50; /* ضبط المسافة الجانبية لتكون متناسبة */
    margin-top: 0; /* إزالة المسافة العلوية التي قد تؤدي إلى تباعد غير مرغوب فيه */
}

.experience .job {
    margin-bottom: 20px; /* إضافة مسافة بين أقسام العمل */
}

.experience .job h3 {
    font-size: 18px;
    font-weight: bold;
    display: flex;
    padding-top: 10px; /* تقليل المسافة العليا لتقليل المسافة الفارغة */
    justify-content: space-between;
    margin-left: 40; /* ضبط الهامش الأيسر ليكون مناسبًا */
    margin-top: -10px; /* إضافة مسافة أعلى صغيرة للفصل بين العناوين */
    margin-bottom: 10px; /* إضافة مسافة أسفل العنوان للفصل بين العناصر التالية */
}

.experience .dates {
    font-size: 16px;
    color: #555;
    margin-left: -40; /* ضبط الهامش الأيسر ليكون مناسبًا */
    margin-top: -10; /* إزالة المسافة العليا غير الضرورية */
    margin-bottom: 10px; /* إضافة مسافة أسفل التاريخ للفصل بين العناصر التالية */
}

.experience .summary {
    font-size: 16px;
    margin-left: 20px;
    margin-top: 0; /* إزالة المسافة العليا غير الضرورية */
    padding-left: 20px;
}

.experience .summary li {
    list-style-type: disc;
    margin-bottom: 5px; /* إضافة مسافة أسفل كل عنصر في القائمة */
}


.languages strong {
  color: #00a4bd;
}

@media print {
  .container {
      page-break-inside: avoid;
  }

  .header,
  .summary,
  .experience,
  .projects,
  .Skills,
  .languages {
      page-break-inside: avoid;
      page-break-after: auto;
  }

  .jop2,
  .jop3 {
      page-break-inside: avoid;
  }
}
.Skills h2 {
margin-bottom: 7px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
text-transform: uppercase;
margin-left: -29px;
margin-top: -5px;
}

.Skills ul {
/* margin-top: 0;
padding-left: 0; إزالة الحشو الداخلي على القائمة */
list-style: none; /* إزالة النقاط الافتراضية */
display: flex;
flex-wrap: wrap;
margin-top: -20px; 
margin-bottom: -20px; 
gap: 10px;
background-color:#ffffff; /* إزالة الخلفية */
}

.Skills ul li {
display: inline-block;
width: calc(33.3% - 10px); /* لجعل كل عنصر يأخذ نصف عرض السطر */
vertical-align: top;
margin-bottom: -8px; /* إضافة مسافة أسفل كل عنصر */
box-sizing: border-box;
background-color:#ffffff; 
}

.lan  {
margin-top: -4px;
margin-bottom: 5px; /* Reduce space below the first language entry */
color:#000000; 
}

.lan2 p {
margin-top: 0; /* Remove space above the second language entry */
}

.projects {
margin: 20px 0;
margin-top: -45px;
margin-bottom: 44px;
}

.projects h2 {
margin-bottom: 10px;
font-size: 1.5em;
text-transform: uppercase;
margin-left: -30px;
margin-top: -5px;
}


.projects ul {
padding-left: 0;
list-style: none;
margin: 0 0 15px 0;
}
.project-list {
background: none; /* إزالة الخلفية */
padding: 0; /* إزالة الحشو إذا كان موجوداً */
margin: 0; /* إزالة الهوامش إذا كانت موجودة */
}

.project-skills, .project-repo {
margin-left: 50px; /* يمكنك تعديل هذا الرقم حسب المسافة المطلوبة */
}

.project-list li {
background: none; /* إزالة الخلفية من عناصر القائمة */
}
.projects ul li {
margin-bottom: 5px;
}

.projects h3 {
margin: 0;
margin-bottom: -20px;
font-size: 1.2em;
}

.projects h5 {
margin: 10px 0;
font-size: 1em;
/* color: #555; */
margin-left: 35px;
}
.projects p {
margin: 10px 0;
font-size: 1em;
margin-left: 50px;
}

.projects a {
color: #007bff; /* تغيير اللون ليناسب تصميمك */
text-decoration: none;
}

.projects a:hover {
text-decoration: underline;
}
    </style>
    
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="name-info">
                <h1><strong>
                        @if (!empty($first_name))
                            {{ $first_name }}
                        @endif
                        <span>
                            @if (!empty($middel_name))
                                {{ $middel_name }}
                            @endif
                        </span>
                        @if (!empty($Family_name))
                            {{ $Family_name }}
                        @endif
                    </strong></h1>
                <div class="contact-info">
                    @if (!empty($phone))
                        <a href="tel:+{{ $phone }}">TEL: {{ $phone }} | </a>
                    @endif
                    @if (!empty($county && $address))
                        Address: {{ $address }} - {{ $county }} |
                    @endif
                    @if (!empty($email))
                        <a href="mailto:{{ $email }}">Email: {{ $email }}</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="summary">
            <h2>Summary</h2>
            @if (!empty($Summary))
                <p><strong>{{ $Summary }}</strong></p>
            @endif
        </div>

        <div class="experience">
            <h2>Experience</h2>
            <div class="job">
                <p class="dates">
                    @if (!empty($start_date_month))
                        ( {{ $start_date_month }}
                    @endif
                    @if (!empty($start_date_year))
                        {{ $start_date_year }}
                    @endif -
                    @if (!empty($end_date_month))
                        {{ $end_date_month }}
                    @endif
                    @if (!empty($end_date_year))
                        {{ $end_date_year }} )
                    @endif
                </p>
                <h3><strong>
                        @if (!empty($type_jop))
                            {{ $type_jop }}
                        @endif
                    </strong><span>-</span><strong>
                        @if (!empty($company_name))
                            {{ $company_name }}
                        @endif
                    </strong></h3>
                @if (!empty($Job_summary))
                    <ul class="summary">
                        <li>{{ $Job_summary }}</li>
                    </ul>
                @endif
            </div>
            
            <div class="job">
                <p class="dates">
                    @if (!empty($start_date_month2))
                        ( {{ $start_date_month2 }}
                    @endif
                    @if (!empty($start_date_year2))
                        {{ $start_date_year2 }} -
                    @endif
                    @if (!empty($end_date_month2))
                        {{ $end_date_month2 }}
                    @endif
                    @if (!empty($end_date_year2))
                        {{ $end_date_year2 }} )
                    @endif
                </p>
                @if (!empty($type_jop2))
                    <h3><strong>
                            @if (!empty($type_jop2))
                                {{ $type_jop2 }}
                            @endif
                        </strong><span>-</span><strong>
                            @if (!empty($company_name2))
                                {{ $company_name2 }}
                            @endif
                    </strong></h3>
                @endif
                
                @if (!empty($Job_summary2))
                    <ul class="summary">
                        <li>{{ $Job_summary2 }}</li>
                    </ul>
                @endif
            </div>
            <div class="job">
                <p class="dates">
                    @if (!empty($start_date_month3))
                        ( {{ $start_date_month3 }}
                    @endif
                    @if (!empty($start_date_year3))
                        {{ $start_date_year3 }} -
                    @endif
                    @if (!empty($end_date_month3))
                        {{ $end_date_month3 }}
                    @endif
                    @if (!empty($end_date_year3))
                        {{ $end_date_year3 }} )
                    @endif
                </p>
                @if (!empty($type_jop3))
                    <h3><strong>
                            @if (!empty($type_jop3))
                                {{ $type_jop3 }}
                            @endif
                        </strong><span>-</span><strong>
                            @if (!empty($company_name3))
                                {{ $company_name3 }}
                            @endif
                    </strong></h3>
                @endif
                
                @if (!empty($Job_summary3))
                    <ul class="summary">
                        <li>{{ $Job_summary3 }}</li>
                    </ul>
                @endif
            </div>
        </div>
      </div>


    </div>
    <div class="projects">
        <h2>Projects:</h2>
        <div>
            @if(!empty($project_name))
                <ul class="project-list">
                    <li><h3>• {{ $project_name }}</h3></li>
                </ul>
            @endif
                @if (!empty($project_name))
                    <h5>Developed a {{ $project_name }} application featuring...</h5>
                @endif
                @if(!empty($skills_project))
                <p class="project-skills"><strong>Skills:</strong> {{ $skills_project }}</p>
            @endif
            @if(!empty($url_project))
                <p class="project-repo">Repo Link: <a href="{{ $url_project }}" target="_blank">{{ $url_project }}</a></p>
            @endif
        </div>
        <div>
            @if(!empty($project_name2))
                <ul>
                    <li class="project-list"><h3>• {{ $project_name2 }}</h3></li>
                </ul>
            @endif
            @if (!empty($project_name2))
                <h5>Developed a {{ $project_name2 }} application featuring...</h5>
            @endif
            @if(!empty($skills_project2))
                <p class="project-skills"><strong>Skills:</strong> {{ $skills_project2 }}</p>
            @endif
            @if(!empty($url_project2))
                <p class="project-repo">Repo Link: <a href="{{ $url_project2 }}" target="_blank">{{ $url_project2 }}</a></p>
            @endif
        </div>
        <div>
            @if(!empty($project_name3))
                <ul>
                    <li class="project-list"><h3>• {{ $project_name3 }}</h3></li>
                </ul>
            @endif
            @if (!empty($project_name3))
                <h5>Developed a {{ $project_name3 }} application featuring...</h5>
            @endif
            @if(!empty($skills_project3))
                <p class="project-skills"><strong>Skills:</strong> {{ $skills_project3 }}</p>
            @endif
            @if(!empty($url_project3))
                <p class="project-repo">Repo Link: <a href="{{ $url_project3 }}" target="_blank">{{ $url_project2 }}</a></p>
            @endif
        </div>
    </div>
    
    <div class="education">
        <h2>education</h2>
        <p class="dates">
            @if (!empty($start_date_month_university))
                ( {{ $start_date_month_university }}
            @endif
            @if (!empty($start_date_year_university))
                {{ $start_date_year_university }}
            @endif -
            @if (!empty($end_date_month_university))
                {{ $end_date_month_university }}
            @endif
            @if (!empty($end_date_year_university))
                {{ $end_date_year_university }} )
            @endif
        </p>
        <div class="university-info">
            <h3>
                @if(!empty($MAJOR))
                <span>MAJOR: {{ $MAJOR }}</span>
                @endif
                <br>
                @if(!empty($University_name))
                <span>University of {{ $University_name }}</span>
                @endif
                <br>
                @if(!empty($university_year))
                <span>year:{{ $university_year }}</strong>
                @endif
            </h3>
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


    
    
    <div class="languages">
        <h2>Languages </h2>
        <div class='lan'>
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
</body>

</html>
