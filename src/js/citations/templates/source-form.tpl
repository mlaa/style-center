<p class="citation-field final-element">
  <label for="container-author-<%= order %>">Author<span class="punctuation">.</span></label>
  <input id="container-author-<%= order %>" name="author" type="text" <%= (author) ? ' value="' + author + '"' : '' %> placeholder="Author of source">
</p>

<p class="citation-field final-element">
  <label for="container-title-<%= order %>">Title of source<span class="punctuation">.</span></label>
  <input id="container-title-<%= order %>" name="title" type="text" <%= (title) ? ' value="' + title + '"' : '' %> placeholder="Title of source">
</p>

<p class="form-controls">
  <button class="add-container" type="button">+ Add a larger container</button>
</p>
