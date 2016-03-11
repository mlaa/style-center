<% var attrs = (data.container) ? data.schema.container : data.schema.source %>

<% if (data.container) { %>
<h3>Container <%= data.order - 1 %></h3>
<% } %>

<% _.each(attrs, function (value, key) { %>
<p class="citation-field <%= data.classNames[key] %>" data-name="<%= key %>">
  <label for="container-title-<%= data.order %>"><%= value.name %><span class="punctuation"><%= value.punctuation %></span></label>
  <span id="container-title-<%= data.order %>" class="field-value"><%= data[key] %></span>
  <span data-lity-image="<%= data.images[key] %>" class="image-link"></span>
</p>
<% }); %>
