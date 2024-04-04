<?php

/**
 * Template Name: Pdf post
 * Template Post Type: post
 */

get_header();

$pdf = false;
if (has_post_thumbnail()) {
    $pdf = get_the_post_thumbnail_url();
}

?>

<section id=":r2:" class="width-wrapper bg-soft-blue pdf-page">
    <div class="flex-col content">
        <div class="flex-row justify-between">
            <div class="btn"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.41 10.59L2.83 6L7.41 1.41L6 0L0 6L6 12L7.41 10.59Z" fill="#004D35"></path>
                </svg>
                <p class="Sub2 color-navy-green ">Back to post</p>
            </div><a href="<?php echo $pdf ?>" download="">
                <div class="btn download">
                    <p class="Sub2 color-navy-green ">Save file</p><svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5837 6.75H11.2503V0.25H4.75033V6.75H0.416992L8.00033 14.3333L15.5837 6.75ZM0.416992 16.5V18.6667H15.5837V16.5H0.416992Z" fill="#AFBCBA"></path>
                    </svg>
                </div>
            </a>
        </div>
        <div class="title">
            <p class="H3 color-black "></p>
        </div>
        <div class="pdf">
            <div class="react-pdf__Document">
                <embed src="<?php echo $pdf ?>" type="application/pdf" width="100%" height="800px" />
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
