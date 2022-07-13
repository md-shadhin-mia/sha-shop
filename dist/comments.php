<?php if (have_comments()) { ?>
    <div class="max-w-screen-sm">
        <h3 class="mb-6 text-3xl font-semibold text-gray-900">Comments</h3>
        <h3 class="mb-6 text-2xl font-semibold text-gray-900">
            <?php
            // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
            printf(
                /* translators: 1: number of comments, 2: post title */
                esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'storefront')),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            // phpcs:enable
            ?>
        </h3>

        <?php if ($comments) { ?>
            <div class="space-y-4">
                <?php foreach ($comments as $comment) { ?>
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                            <?php
                            echo get_avatar($comment, $size = '60', $default = '', $alt = '', $args = array('class' => 'mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10'));
                            ?>
                        </div>
                        <div class="flex-1 border border-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">

                            <strong><?php comment_author() ?></strong><span class="text-xs px-2 text-gray-400"><?php comment_date(); ?></span>

                            <p class="text-sm"><?php comment_text(); ?></p>
                        </div>
                    </div>

                <?php } ?>
            </div>

        <?php } ?>
    </div>

<?php } ?>

<?php comment_form(array(
    'comment_field'        => sprintf(
        '<div class="flex flex-wrap mb-6">%s %s</div>',
        sprintf('<label for="comment">%s</label>',_x( 'Comment', 'noun' )),
        '<textarea id="comment" name="comment" class="rounded border border-gray-200 leading-normal resize-none w-full h-32 py-4 px-3 focus:outline-none0 text-sm" placeholder="Type Your Comment" required=""></textarea>'
    ),
    "class_submit"=>"transition duration-300 ease-in-out transform hover:-translate-y-1 block p-4 text-center text-xs text-white font-semibold leading-none bg-blue-500 hover:bg-blue-700 rounded mt-6",
    "class_form"=>"max-w-screen-sm",
    'class_container'=> 'comment-respond mb-4 mt-12',
))?>
