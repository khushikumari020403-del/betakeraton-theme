<?php
/**
 * Forside hoved Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-lp-two-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-lp-two';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 

$id = 'hero-lp-two-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'hero-lp-two';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// ACF Fields
$main_image = get_field('main_image');
$circle_image = get_field('circle_image');
$product_box_image = get_field('product_box_image');
$title = get_field('title');
$features = get_field('features');
$old_price = get_field('old_price');
$new_price = get_field('new_price');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$urgency_text = get_field('urgency_text');
$money_back_link = get_field('money_back_link');
$guarantees = get_field('guarantees');
$testimonial_image = get_field('testimonial_image');
$testimonial_name = get_field('testimonial_name');
$testimonial_text = get_field('testimonial_text');

// Discount Calculation
$discount_percent = 0;
if ($old_price && $new_price) {
    $discount_percent = round((($old_price - $new_price) / $old_price) * 100);
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hero-lp-two__container">

        <!-- Left Side Images -->
        <div class="hero-lp-two__images">
            <?php if ($main_image): ?>
                <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt']); ?>" class="main-img">
            <?php endif; ?>

            <?php if ($circle_image): ?>
                <img src="<?php echo esc_url($circle_image['url']); ?>" alt="<?php echo esc_attr($circle_image['alt']); ?>" class="circle-img">
            <?php endif; ?>

            <?php if ($product_box_image): ?>
                <img src="<?php echo esc_url($product_box_image['url']); ?>" alt="<?php echo esc_attr($product_box_image['alt']); ?>" class="box-img">
            <?php endif; ?>
        </div>

        <!-- Right Side Content -->
        <div class="hero-lp-two__content">

            <!-- Title -->
            <?php if ($title): ?>
                <h1 class="hero-lp-two__title"><?php echo esc_html($title); ?></h1>
            <?php endif; ?>

            <!-- Features List -->
            <?php if ($features): ?>
                <ul class="hero-lp-two__features">
                    <?php foreach ($features as $feature): ?>
                        <li><?php echo esc_html($feature['text']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- Price Section -->
            <div class="hero-lp-two__price">
                <?php if ($old_price): ?>
                    <span class="old-price"><?php echo esc_html($old_price); ?>kr</span>
                <?php endif; ?>

                <?php if ($new_price): ?>
                    <span class="new-price"><?php echo esc_html($new_price); ?>kr</span>
                <?php endif; ?>

                <?php if ($discount_percent > 0): ?>
                    <span class="discount-badge"><?php echo $discount_percent; ?>% RABATT</span>
                <?php endif; ?>
            </div>

            <!-- CTA Button -->
            <?php if ($button_text && $button_link): ?>
                <a href="<?php echo esc_url($button_link); ?>" class="cta-button"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>

            <!-- Urgency Text -->
            <?php if ($urgency_text): ?>
                <p class="urgency-text"><?php echo esc_html($urgency_text); ?></p>
            <?php endif; ?>

            <!-- Money Back Link -->
            <?php if ($money_back_link): ?>
                <p class="money-back"><a href="<?php echo esc_url($money_back_link); ?>">Money-back guarantee</a></p>
            <?php endif; ?>

            <!-- Guarantees -->
            <?php if ($guarantees): ?>
                <div class="hero-lp-two__guarantees">
                    <?php foreach ($guarantees as $item): ?>
                        <div class="guarantee-item">
                            <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="">
                            <p><?php echo esc_html($item['label']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Testimonial -->
            <div class="hero-lp-two__testimonial">
                <?php if ($testimonial_image): ?>
                    <img src="<?php echo esc_url($testimonial_image['url']); ?>" alt="">
                <?php endif; ?>
                <div class="testimonial-text">
                    <strong><?php echo esc_html($testimonial_name); ?></strong>
                    <p><?php echo esc_html($testimonial_text); ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
