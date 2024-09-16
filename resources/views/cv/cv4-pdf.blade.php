<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Youssef Ahmed Shaker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            padding: 20px;
        }

        .name-info h1 {
            margin-bottom: 0px;
            margin-top: -30px;
            margin-left: 180px;
        }
        .name-info h3 {
            margin-bottom: 0px;
            margin-top: 0px;
            margin-left: 230px;
            color:rgb(35, 163, 163);
        }

        .address{
            margin-top: -40px;
            margin-left: 200px;
            margin-bottom: 10px;
            color:rgb(35, 163, 163);
        }
        
        .email{
            margin-top: -40px;
            margin-left: 210px;
            
        }
        .email a {
            text-decoration: none;
            color: inherit;
        }
        
        .lan a {
            text-decoration: none;
            color: inherit;
            color:rgb(35, 163, 163);
        }
        
        .phone a {
            text-decoration: none;
            color: inherit;
        }
        
        .phone{
            margin-top: -25px;
            margin-left: 260px;
            text-decoration: none;
        }

        .Summary h2{
            margin-top: -40px;
            margin-left: 200px;
        }
        
        .header {
            margin-bottom: 20px;
        }
        
        .header .contact-info a {
            color: #000;
            color:rgb(35, 163, 163);
        }

        .header .contact-info a:hover {
            text-decoration: underline;
        }
        
        .skills ul {
            padding-left: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            color:rgb(35, 163, 163);
        }
        
        .skills ul li {
            width: calc(50% - 10px);
            margin-bottom: 10px;
            color:rgb(35, 163, 163);
        }
        
        .projects h5, .projects p {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .education p {
            margin-bottom: 5px;
            color:rgb(35, 163, 163);
        }

        .Summary p{
            color:rgb(35, 163, 163);
        }

        .Skills h2 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        text-transform: uppercase;
        margin-left: 280px;
        margin-top: -10px;
        }
        .exp h2 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        text-transform: uppercase;
        margin-left: 250px;
        margin-top: 50px;
        }
        .exp h3 {
            margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
            margin-left: 0px;
            margin-top: 0px;
        }
        .exp p {
            margin-bottom: -10px;
            margin-left: 400px;
            margin-top: -40px;
        }
        
        .jop_summary{
            margin-top: 30px;
            margin-bottom: -4px;
        }
        .edu h2 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        text-transform: uppercase;
        margin-left: 250px;
        margin-top: 5px;
        }
        
        .edu p{
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            color:rgb(35, 163, 163);
        }
        .proj h2 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        text-transform: uppercase;
        margin-left: 250px;
        margin-top: 5px;
    }

    .exp .jop_summary{
        color:rgb(35, 163, 163);
    }
    .proj h3 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        margin-left: 2px;
        margin-top: 5px;
        }
        .proj ul {
        padding-left: 0; /* إزالة التباعد الافتراضي على اليسار للقائمة */
        margin: 1; /* إزالة الهوامش الافتراضية */
        color:rgb(35, 163, 163);
    }

    .proj h5 {
        margin-top: 15px; /* تقليل المسافة بين h5 و p */
        margin-bottom: -5px; /* تقليل المسافة بين p والعناصر التالية */
        margin-left: 30px; /* تقليل المسافة بين p والعناصر التالية */
        color:rgb(35, 163, 163);
    }
    .proj p {
        margin-top: 10px; /* تقليل المسافة بين h5 و p */
        margin-bottom: -2px; /* تقليل المسافة بين p والعناصر التالية */
        margin-left: 45px; /* تقليل المسافة بين p والعناصر التالية */
        color:rgb(35, 163, 163);
    }
    
    .lan h2 {
        margin-bottom: -10px; /* يمكنك تعديل هذا الرقم لتقليل المسافة */
        text-transform: uppercase;
        margin-left: 250px;
        margin-top: 5px;
    }
    
    .lan p {
        margin-top: 10px; /* تقليل المسافة بين h5 و p */
        margin-bottom: -2px; /* تقليل المسافة بين p والعناصر التالية */
        margin-left: 10px; /* تقليل المسافة بين p والعناصر التالية */
        text-transform: uppercase;
        color:rgb(35, 163, 163);
    }
.Skills ul {
    margin-top: 0;
    padding-left: 0; /* إزالة الحشو الداخلي على القائمة */
    list-style: none; /* إزالة النقاط الافتراضية */
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    background-color:#ffffff; /* إزالة الخلفية */
    margin-bottom: -40px;
    color:rgb(35, 163, 163);
}

.Skills ul li {
    display: inline-block;
    width: calc(50% - 10px); /* لجعل كل عنصر يأخذ نصف عرض السطر */
    vertical-align: top;
    margin-bottom: -8px; /* إضافة مسافة أسفل كل عنصر */
    box-sizing: border-box;
    background-color:#ffffff; 
    color:rgb(35, 163, 163);
}
    </style>
</head>

<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-start mb-4">
            <div class="name-info">
                <h1><strong>
                    @if(!empty($first_name)) {{ $first_name }} @endif
                    @if(!empty($middel_name)) {{ $middel_name }} @endif
                    @if(!empty($Family_name)) {{ $Family_name }} @endif
                </strong></h1>
                <h3>
                    @if(!empty($career_job)) {{ $career_job }} @endif
                </h3>
                <hr>
                <div class='address'>
                    @if(!empty($county && $address))
                <p>{{ $address }} - {{ $county }}</p>
                @endif
                </div>
                <div class='email'>
                    <div class="contact-info text-right">
                        @if(!empty($email))
                    <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                    @endif
                    </div>
                </div>
                <div class='phone'>
                    <div class="contact-info text-right">
                        @if(!empty($phone))
                        <p><a href="tel:+{{ $phone }}">{{ $phone }}</a></p>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        <hr>
        <div class="summary mb-4">
            <div class='Summary'>
                <h2>Professional Summary</h2>
                @if(!empty($Summary))
                <p><strong>{{ $Summary }}</strong></p>
            </div>
            @endif
        </div>
        <div class="Skills">
            <h2>Skills</h2>
            <hr>
            <div>
                <ul>
                    @if(!empty(!empty($skills)))
                        @foreach($skills as $skill)
                            <li>• {{ $skill }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="experience mb-4">
            <div class='exp'>
                <h2>Experience:</h2>
                <hr>
                <div>
                    @if(!empty($type_jop))
                    <h3><strong>
                        {{ $type_jop }} - {{ $company_name }}
                    </strong></h3>
                    @endif
                    <p>
                        @if(!empty($start_date_month))
                        ( {{ $start_date_month }}
                        @endif
                        @if(!empty($start_date_year))
                        {{ $start_date_year }} - 
                        @endif
                        @if(!empty($start_date_year))
                        {{ $end_date_month}}
                        @endif
                        @if(!empty($end_date_year))
                        {{ $end_date_year }} )
                        @endif
                    </p>
                    @if(!empty($Job_summary))
                    <div class='jop_summary'>{{ $Job_summary }}</div>
                    @endif
                </div>
                <div>
                    @if(!empty($type_jop2))
                    <h3><strong>
                        {{ $type_jop2 }} - {{ $company_name2 }}
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
                        {{ $end_date_year2 }} )
                        @endif
                    </p>
                    @if(!empty($Job_summary2))
                    <div class='jop_summary'>{{ $Job_summary2 }}</div>
                    @endif
                </div>
                <div>
                    @if(!empty($type_jop3))
                    <h3><strong>
                        {{ $type_jop3 }} - 
                        @if(!empty($company_name3))
                        {{ $company_name3 }}
                        @endif
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
                        {{ $end_date_year3 }} )
                        @endif
                    </p>
                    @if(!empty($Job_summary3))
                    <div class='jop_summary'>{{ $Job_summary3 }}</div>
                    @endif
                </div>
                <br>
            </div>
        </div>
        
        <div class="education mb-4">
            <div class='edu'>
            <h2>Education:</h2>
            <hr>
            <p>
            @if(!empty($University_name))
                <strong>Institute:</strong> {{ $University_name }} 
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
            @if(!empty($MAJOR))
            <p><strong>Major:</strong> {{ $MAJOR }}</p>
            @endif
            @if(!empty($university_year))
            <p><strong>Year:</strong> {{ $university_year }}</p>
            @endif
        </div>
        </div>
        <div class='proj'>
            <h2>Projects:</h2>
            <hr>
            <div>
                @if(!empty($project_name))
                <h3>• {{ $project_name }}</h3>
                <h5>Developed a {{ $project_name }} application featuring...</h5>
                @endif
                @if(!empty($skills_project))
                <p><strong>Skills:</strong> {{ $skills_project }}</p>
                @endif
                @if(!empty($url_project))
                <p>Repo Link: {{ $url_project }}</p>
                @endif
            </div>
            <div>
                @if(!empty($project_name2))
                <h3>• {{ $project_name2 }}</h3>
                <h5>Developed a {{ $project_name2 }} application featuring...</h5>
                @endif
                @if(!empty($skills_project2))
                <p><strong>Skills:</strong> {{ $skills_project2 }}</p>
                @endif
                @if(!empty($url_project2))
                <p>Repo Link: {{ $url_project2 }}</p>
                @endif
            </div>
            <div>
                @if(!empty($project_name3))
                <h3>• {{ $project_name3 }}</h3>
                <h5>Developed a {{ $project_name3 }} application featuring...</h5>
                @endif
                @if(!empty($skills_project3))
                <p><strong>Skills:</strong> {{ $skills_project3 }}</p>
                @endif
                @if(!empty($url_project3))
                <p>Repo Link: {{ $url_project3 }}</p>
                @endif
            </div>
            <br>
        </div>
        <div class="languages mb-4">
            <div class='lan'>
                <h2>Languages:</h2>
                <hr>
                @if(!empty($languages_name1))
                <p><strong><span style="color:rgb(0, 0, 0);">• {{ $languages_name1 }}<span></span>:</strong> {{ $language_level1 }}</p>
                @endif
                @if(!empty($language_name2))
                <p><strong><span style="color:rgb(0, 0, 0);">• {{ $language_name2 }}:</span></strong> {{ $language_level2 }}</p>
                @endif
            </div>
        </div>
        <div class="languages mb-4">
            <div class='lan'>
                <h2><span> </span>links:</h2>
                <hr>
                @if(!empty($linkedin))
                <p><span style="color:rgb(0, 0, 0);">LinkedIn: </span><a href="{{ $linkedin }}">{{ $linkedin }}</a></p>
                @endif
                @if(!empty($github))
                <p><span style="color:rgb(0, 0, 0);">GitHub: </span><a href="{{ $github }}">{{ $github }}</a></p>
                @endif
            </div>
        </div>
        
            
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
