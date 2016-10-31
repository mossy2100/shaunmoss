// JavaScript Document

function validEmail(email) {
  // check the supplied email address is valid:
  var re = /^[\.\-\w]+\@([a-z\d\-]+\.)+([a-z]{2,6})$/i;
  return re.test(email);
}
