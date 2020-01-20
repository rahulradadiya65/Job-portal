<div class="resume-content">
    @include('resume.career_objective.career_objective')  {{-- Include exorince file --}}
    @include('resume.experience.experience')  {{-- Include exorince file --}}
    @include('resume.education.education')
    @include('resume.language.language')
    @include('resume.declaration.declaration')
    <div class="buttons">
        <a href="#" class="btn">Send Email</a>
    </div>
    <div class="download-button">
        <a href="#" class="btn">Download Resume as doc</a>
    </div>
</div><!-- resume-content -->						
</div><!-- container -->
