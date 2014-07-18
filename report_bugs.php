<!DOCTYPE html>
<html>
<head>
</head>
  <body>
    <h1>Report bugs</h1>

    <p>Use the button below to file a bug report for Crosswalk.</p>

    <p>If you need to add more detail than is possible in this form,
    please report the issue in
    <a href="https://crosswalk-project.org/jira/">Crosswalk's issue
    tracker</a>.</p>

    <p><button id="jira-feedback-trigger">Open bug report form</button></p>

    <script>
    <?php
    // the JavaScript is inlined into the page, as the code which
    // fetches this PHP via ajax is unable to do anything with
    // <script> elements with src attributes;
    // feedback.js contains the JavaScript generated by Jira when you
    // create an issue collector; it should be created with a custom
    // trigger, then downloaded manually and pasted into the
    // feedback.js file;
    // the issue collector definition is in
    // https://crosswalk-project.org/jira/secure/ViewCollector!default.jspa?projectKey=XWALK&collectorId=75c5359a
    echo file_get_contents(dirname(__FILE__) . '/feedback.js');
    ?>

    // custom Jira feedback trigger; see
    // https://confluence.atlassian.com/display/JIRA/Advanced+Use+of+the+JIRA+Issue+Collector
    window.ATL_JQ_PAGE_PROPS = $.extend(window.ATL_JQ_PAGE_PROPS, {
      fieldValues: {
        description: '*Crosswalk version:* <full version number>\n\n' +
                     '*Environment:*\n\n' +
                     '<operating system, hardware>\n\n' +
                     '*Steps to reproduce:*\n\n' +
                     '1. <step 1>\n' +
                     '2. <step 2>\n' +
                     '3. <step 3>\n' +
                     '...<more steps>...\n\n' +
                     '*Expected result:*\n\n' +
                     '<describe expected result>\n\n' +
                     '*Actual result:*\n\n' +
                     '<describe actual result>'
        },

        triggerFunction: function (showCollectorDialog) {
          $('#jira-feedback-trigger').on('click', function (e) {
            e.preventDefault();
            showCollectorDialog();
          });
        }
      }
    );
    </script>
  </body>
</html>