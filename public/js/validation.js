  
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {
            categories_id: {
                required: true
            },
            jobs_types_id: {
                required: true
            },
            jobs_title: {
                required: true
            },
            description: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            },
            minimum_salary: {
                required: true
            },
            maximum_salary: {
                required: true
            },
            minimum_experience: {
                required: true
            },
             maximum_experience: {
                required: true
            },
            jobfunction: {
                required: true
            },
            salary_types_id: {
                required: true
            },
            skills: {
                required: true
            },
            industry_id: {
                required: true
            }
        }
    });
});
// When the document is ready
//use for date    
$('.calendar').datepicker({
  format: "yyyy/mm/dd"
});    

