<footer class="main-footer">
  <div class="container">
    <?php if ( is_active_sidebar( 'footer' ) ) : ?>
    <div class="columns">
      <div class="column is-9 is-offset-3">
        <?php dynamic_sidebar( 'footer' ); ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="columns">
      <div class="column is-2 is-offset-3">
        <div class="widget support">
          <p><?php echo __('Supported by'); ?></p>
          <img src="https://ccstatic.org/openglam-landing/img/cc.logo.svg" alt="Creative Commons logo">
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>