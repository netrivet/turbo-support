<div class="turbo_search_version_selector">
  <div class="turbo_search_version_selector_title">Your ProPhoto Version</div>
  <label>
    <input type="radio" value="7" name="search_version"<?php echo $cookiedVersion !== '7' ? '' : 'checked' ?> />
    ProPhoto 7
  </label>
  <label>
    <input type="radio" value="6" name="search_version"<?php echo $cookiedVersion === '6' ? 'checked' : '' ?> />
    ProPhoto 6
  </label>
</div>
