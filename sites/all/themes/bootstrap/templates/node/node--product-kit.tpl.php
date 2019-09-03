<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup templates
 */

//mdump($content['group_header'], 2);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
      <header class="card">
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
            <h1 class="m-0 h3" <?php print $title_attributes; ?>><?php print $title; ?></h1>
          <?php
            if(isset($content['field_ostad']['#items']['0'] )):
              $ostad = user_load($content['field_ostad']['#items']['0']['uid']);
          ?>
            <span class="text-muted">استاد دوره: <?php echo $ostad->field_naame['und'][0]['value'];?></span>
          <?php endif;?>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      </header>
  <?php endif; ?>
  <?php
      $bought_products = bought_products_by_product_kit($node->nid);
      if(count($bought_products) > 0){
        $content['group_header']['add_to_cart'] = array(
            '#markup' => '<div><a href="#products" class="node-add-to-cart">جلسات دوره</a></div>',
            '#weight' => 4
        );
      }else{
        $content['group_header']['add_to_cart']['#form']['actions']['submit']['#value'] = 'خرید کل دوره';
      }

      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['products']);
      hide($content['body']);
      hide($content['field_ostad']);
      print render($content);
  ?>

    <?php //print render(user_view($ostad, 'special_case'));?>
    <div class="user-profile view-mode-special_case clearfix d-flex card mt-5 " style="position: relative;overflow: hidden;">
        <div class="group-left">
            <span class="bg-text">معرفی استاد</span>
            <div class="h4 p-4 pr-5">
                <i class="mdi mdi-account align-items-center d-inline-flex justify-content-center ml-4 rounded-circle"></i>
              <?php echo $ostad->field_naame['und'][0]['value'] ;?>
            </div>

            <div class="field-tea-bio pr-3">
                <?php print instrument_info('ostad_uid', $ostad->uid, array('Teacher_Intro'));?>
            </div>
        </div>

        <div class="group-right">
            <img typeof="foaf:Image" class="img-responsive" src="<?php print image_style_url('350x350', $ostad->field_secpicture['und'][0]['uri']) ;?>"alt="">
        </div>
    </div>

    <section class="main card mt-5">
      <?php print render($content['body']);?>
        <div id="products" class="products">
            <h4>جلسات این دوره</h4>
          <?php print render($content['products']);?>
        </div>
    </section>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
      <footer>
        <?php print render($content['field_tags']); ?>
        <?php print render($content['links']); ?>
      </footer>
  <?php endif; ?>
  <?php //print render($content['comments']); ?>
</article>


<style>
    .node-product-kit .add-to-cart [id*=edit-products] {
        display: none;
    }

</style>