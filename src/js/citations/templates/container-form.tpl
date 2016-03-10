<h3>Container <%= containerNumber %></h3>

<p class="citation-field">
  <label for="container-title-<%= order %>">Title of container<span class="punctuation">,</span></label>
  <input id="container-title-<%= order %>" name="title" type="text" <%= (title) ? ' value="' + title + '"' : '' %> placeholder="Title of container">
</p>

<p class="citation-field">
  <label for="container-author-<%= order %>">Other contributors<span class="punctuation">,</span></label>
  <input id="container-author-<%= order %>" name="author" type="text" <%= (author) ? ' value="' + author + '"' : '' %> placeholder="Other contributor or contributors">
</p>

<p class="citation-field">
  <label for="container-version-<%= order %>">Version<span class="punctuation">,</span></label>
  <input id="container-version-<%= order %>" name="version" type="text" <%= (version) ? ' value="' + version + '"' : '' %> placeholder="Version number">
</p>

<p class="citation-field">
  <label for="container-number-<%= order %>">Number<span class="punctuation">,</span></label>
  <input id="container-number-<%= order %>" name="number" type="text" <%= (number) ? ' value="' + number + '"' : '' %> placeholder="Volume, issue, or record number">
</p>

<p class="citation-field">
  <label for="container-publisher-<%= order %>">Publisher<span class="punctuation">,</span></label>
  <input id="container-publisher-<%= order %>" name="publisher" type="text" <%= (publisher) ? ' value="' + publisher + '"' : '' %> placeholder="Publisher">
</p>

<p class="citation-field">
  <label for="container-pubdate-<%= order %>">Publication date<span class="punctuation">,</span></label>
  <input id="container-pubdate-<%= order %>" name="pubdate" type="text" <%= (pubdate) ? ' value="' + pubdate + '"' : '' %> placeholder="Publication date">
</p>

<p class="citation-field final-element">
  <label for="container-location-<%= order %>">Location<span class="punctuation">.</span></label>
  <input id="container-location-<%= order %>" name="location" type="text" <%= (location) ? ' value="' + location + '"' : '' %> placeholder="Page numbers, DOI, URL">
</p>

<p class="form-controls">
  <button class="add-container" type="button">+ Add a larger container</button>
  <button class="remove-container" type="button"></button>
</p>
