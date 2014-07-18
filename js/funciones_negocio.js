  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "itemContainer_negocio",
      perPage      : 25,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });