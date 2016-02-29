<h3>Container <%= containerNumber %></h3>

<p class="field">
  <input id="container-title-<%= order %>" name="title" type="text" <%= (title) ? ' value="' + title + '"' : '' %> placeholder="Title of container">
  <label for="container-title-<%= order %>">Title of container</label>
</p>

<p class="field">
  <input id="container-author-<%= order %>" name="author" type="text" <%= (author) ? ' value="' + author + '"' : '' %> placeholder="Other contributor or contributors">
  <label for="container-author-<%= order %>">Other contributors</label>
</p>

<p class="field">
  <input id="container-version-<%= order %>" name="version" type="text" <%= (version) ? ' value="' + version + '"' : '' %> placeholder="Version number">
  <label for="container-version-<%= order %>">Version</label>
</p>

<p class="field">
  <input id="container-number-<%= order %>" name="number" type="text" <%= (number) ? ' value="' + number + '"' : '' %> placeholder="Volume, issue, or record number">
  <label for="container-number-<%= order %>">Number</label>
</p>

<p class="field">
  <input id="container-publisher-<%= order %>" name="publisher" type="text" <%= (publisher) ? ' value="' + publisher + '"' : '' %> placeholder="Publisher">
  <label for="container-publisher-<%= order %>">Publisher</label>
</p>

<p class="field">
  <input id="container-pubdate-<%= order %>" name="pubdate" type="text" <%= (pubdate) ? ' value="' + pubdate + '"' : '' %> placeholder="Publication date">
  <label for="container-pubdate-<%= order %>">Publication date</label>
</p>

<p class="field final-element">
  <input id="container-location-<%= order %>" name="location" type="text" <%= (location) ? ' value="' + location + '"' : '' %> placeholder="Page numbers, DOI, URL">
  <label for="container-location-<%= order %>">Location</label>
</p>

<p class="form-controls">
  <button class="add-container" type="button">+ Add a larger container</button>
  <button class="remove-container" type="button"></button>
</p>
