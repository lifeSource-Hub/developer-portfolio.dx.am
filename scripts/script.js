function showDropNav()
{
  $(this).children("ul").slideDown();
}

function hideDropNav()
{
  $(this).children("ul").hide();
}

$(".dropNav").hover(showDropNav, hideDropNav);