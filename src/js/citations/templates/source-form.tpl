<p class="field final-element">
  <input id="container-author-<%= order %>" name="author" type="text" <%= (author) ? ' value="' + author + '"' : '' %> placeholder="Author of source">
  <label for="container-author-<%= order %>">Author</label>
</p>

<p class="field final-element">
  <input id="container-title-<%= order %>" name="title" type="text" <%= (title) ? ' value="' + title + '"' : '' %> placeholder="Title of source">
  <label for="container-title-<%= order %>">Title of source</label>
</p>

<p class="form-controls">
  <button class="add-container" type="button">+ Add a larger container</button>
</p>
