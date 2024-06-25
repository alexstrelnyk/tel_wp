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
                <div class="btn">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41 10.59L2.83 6L7.41 1.41L6 0L0 6L6 12L7.41 10.59Z" fill="#004D35"></path>
                    </svg>
                    <p class="Sub2 color-navy-green ">Back to post</p>
                </div>
            </a>
            <a href="<?php echo $pdf ?>" download="">
                <div class="btn download">
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
    </div>
</section>

<script>
    $(window).on('load', function() {
        renderPDF('<?php echo $pdf ?>');
    });
</script>

<?php

get_footer();
