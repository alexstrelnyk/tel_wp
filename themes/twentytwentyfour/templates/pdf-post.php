<?php

/**
 * Template Name: Pdf post
 * Template Post Type: post
 */

get_header();

$pdf = false;
if (!$pdf = get_field('image_link')) {
    if (get_field('post_file')) {
        $pdf = get_field('post_file')['url'];
    }
}

?>

<section id=":r2:" class="width-wrapper bg-soft-blue pdf-page">
    <div class="flex-col content">
        <div class="flex-row justify-between">
            <a href="<?php echo get_field('back_button_url') ?>">
                <div class="btn" data-cursor="active">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41 10.59L2.83 6L7.41 1.41L6 0L0 6L6 12L7.41 10.59Z" fill="#004D35"></path>
                    </svg>
                    <p class="Sub2 color-navy-green ">Back to post</p>
                </div>
                <div class="btn-mob flex-row aling-center" data-cursor="active">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2710_307)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18L2 12L12 6L12 10.9608L22 10.9608L22 13.0392L12 13.0392L12 18Z" fill="#004D35"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_2710_307">
                                <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="Sub2 color-navy-green ">Back to post</p>
                </div>
            </a>
            <a href="<?php echo $pdf ?>" download="">
                <div class="btn download" data-cursor="active">
                    <p class="Sub2 color-navy-green ">Save file</p><svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5837 6.75H11.2503V0.25H4.75033V6.75H0.416992L8.00033 14.3333L15.5837 6.75ZM0.416992 16.5V18.6667H15.5837V16.5H0.416992Z" fill="#AFBCBA"></path>
                    </svg>
                </div>
            </a>
        </div>
        <div class="title">
            <p class="H3 color-black "><?php echo get_field('description') ?></p>
        </div>
        <div class="pdf">
            <span id="pdf_loader">Loading PDF...</span>
            <div id="pdf-embed-library">
                <canvas id="pdfCanvas"></canvas>
            </div>
        </div>
        <div class="btn-wrapper-mob">
            <a href="<?php echo $pdf ?>" download="">
                <div class="btn-mob download flex-row justify-center" data-cursor="active">
                    <p class="Sub2 color-navy-green ">Save file</p><svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5837 6.75H11.2503V0.25H4.75033V6.75H0.416992L8.00033 14.3333L15.5837 6.75ZM0.416992 16.5V18.6667H15.5837V16.5H0.416992Z" fill="#AFBCBA"></path>
                    </svg>
                </div>
            </a>
        </div>
        <div class="btn-wrapper">
            <a href="<?php echo $pdf ?>" download="">
                <div class="btn download flex-row justify-center">
                    <p class="Sub2 color-navy-green ">Save file</p><svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5837 6.75H11.2503V0.25H4.75033V6.75H0.416992L8.00033 14.3333L15.5837 6.75ZM0.416992 16.5V18.6667H15.5837V16.5H0.416992Z" fill="#AFBCBA"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    $(window).on('load', function() {
        renderPDF('<?php echo $pdf ?>');
    });
</script>

<?php

get_footer();
