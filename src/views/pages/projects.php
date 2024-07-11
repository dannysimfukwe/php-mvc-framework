<?php
    @include_once('includes/header.php');
?>
<div class="university-container">
    <div class="university-header">
        <h4 class="university-title">Our Tech Stack</h4>
    </div>
    <div class="university-contents">
        <ul class="uni-menu">
            <li class="uni-menu-item active" onclick="scrollToPoint(1)">Backend</li>
            <li class="uni-menu-item" onclick="scrollToPoint(2)">Front-End</li>
            <li class="uni-menu-item" onclick="scrollToPoint(3)">DevOps</li>
            <li class="uni-menu-item" onclick="scrollToPoint(4)">AI</li>
        </ul>

        <div class="university-block" id="university-block-1">
            <div class="university-block-left">
                <h3 class="university-block-left-title beginer">
                    Backend
                </h3>
                <p class="university-block-left-desc">
                    We use several types of backend languages to deliver high quality products
                </p>
                <span class="university-block-left-desc-normal">
                    <i class="beginer-vector"></i>
                    We use all popular high performance languages to write code that's scallable and easily maintenable 
                </span>
                <a href="/start-a-project" class="start-course beginer">Start a Project</a>

            </div>
            <div class="university-block-right">
                <svg
                    fill="#BFA166"
                    viewBox="0 0 16 16"
                    height="1em"
                    width="1em"
                    >
                    <path d="M10.478 1.647a.5.5 0 10-.956-.294l-4 13a.5.5 0 00.956.294l4-13zM4.854 4.146a.5.5 0 010 .708L1.707 8l3.147 3.146a.5.5 0 01-.708.708l-3.5-3.5a.5.5 0 010-.708l3.5-3.5a.5.5 0 01.708 0zm6.292 0a.5.5 0 000 .708L14.293 8l-3.147 3.146a.5.5 0 00.708.708l3.5-3.5a.5.5 0 000-.708l-3.5-3.5a.5.5 0 00-.708 0z" />
                </svg>
            </div>
        </div>

        <div class="university-block" id="university-block-2">
            <div class="university-block-left">
                <h3 class="university-block-left-title intermidiate">
                    Title
                </h3>
                <p class="university-block-left-desc">
                    summary
                </p>
                <span class="university-block-left-desc-normal">
                    <i class="intermidiate-vector"></i>
                    desc
                </span>
                <a href="/university" class="start-course intermidiate">Start Course</a>

            </div>
            <div class="university-block-right">
            <svg
                viewBox="0 0 32 32"
                fill="#06CFF1"
                height="1em"
                width="1em"
                >
                <path
                    fill="#06CFF1"
                    d="M21.652 3.098H4.697v26.375h22.607V8.75l-5.652-5.652zm3.768 24.491H6.581V4.982h13.188l5.652 5.652v16.955zM12.269 11.851l-3.644 4.434 3.644 4.434.862-1.417-2.455-3.017 2.455-3.017zm1.594 8.763h1.599l2.542-8.681h-1.599zm5.868-8.763l-.862 1.418 2.455 3.017-2.455 3.017.862 1.418 3.644-4.434z"
                />
            </svg>
            </div>
        </div>

        <div class="university-block" id="university-block-3">
            <div class="university-block-left">
                <h3 class="university-block-left-title expert">
                    title
                </h3>
                <p class="university-block-left-desc">summary</p>
                <span class="university-block-left-desc-normal">
                    <i class="expert-vector"></i>
                    desc
                </span>
                <a href="/university" class="start-course expert">Start Course</a>

            </div>
            <div class="university-block-right">
            <svg
                fill="none"
                stroke="#83E877"
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                viewBox="0 0 24 24"
                height="1em"
                width="1em"
                >
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M12 15H5.5a2.5 2.5 0 110-5H6M15 12v6.5a2.5 2.5 0 11-5 0V18M12 9h6.5a2.5 2.5 0 110 5H18M9 12V5.5a2.5 2.5 0 015 0V6" />
            </svg>
            </div>
        </div>

        <div class="university-block" id="university-block-4">
            <div class="university-block-left">
                <h3 class="university-block-left-title mentorship">
                    title
                </h3>
                <p class="university-block-left-desc">summary</p>
                <span class="university-block-left-desc-normal">
                    <i class="mentorship-vector"></i>
                    desc
                </span>
                <a href="/university" class="start-course mentorship">Start Course</a>

            </div>
            <div class="university-block-right mentorship">

            </div>
        </div>

    </div>
</div>
<script>
    
    function scrollToPoint(el){
        document.querySelector('#university-block-'+el).scrollIntoView({
        behavior: 'smooth'
    });
}
</script>
<?php 
    @include_once('includes/footer.php');
?>