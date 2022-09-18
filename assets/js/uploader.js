console.log("jQuery");

jQuery(document).ready(function ($) {
  // click event
  $(".misha-upload-button").click(function (event) {
    // button click
    // prevent default link click event
    event.preventDefault();

    const button = $(this);
    // we are going to use <input type="hidden"> to store image IDs, comma separated
    const hiddenField = button.prev();
    const hiddenFieldValue = hiddenField.val().split(",");

    const customUploader = wp
      .media({
        title: "Insert images",
        library: {
          type: "image",
        },
        button: {
          text: "Use these images",
        },
        multiple: true,
      })
      .on("select", function () {
        // get selected images and rearrange the array
        let selectedImages = customUploader
          .state()
          .get("selection")
          .map((item) => {
            item.toJSON();
            return item;
          });

        selectedImages.map((image) => {
          // add every selected image to the <ul> list
          $(".misha-gallery").append(
            '<li data-id="' +
              image.id +
              '"><span style="background-image:url(' +
              image.attributes.url +
              ')"></span><a href="#" class="misha-gallery-remove">×</a></li>'
          );
          // and to hidden field
          hiddenFieldValue.push(image.id);
        });

        // refresh sortable
        $(".misha-gallery").sortable("refresh");
        // add the IDs to the hidden field value
        hiddenField.val(hiddenFieldValue.join());
      })
      .open();
  });

  // remove image event
  $(".misha-gallery-remove").click(function (event) {
    event.preventDefault();

    const button = $(this);
    const imageId = button.parent().data("id");

    //console.log(button.parent().parent().next().val().split(","));
    const container = button.parent().parent();
    const hiddenField = container.next();
    //const hiddenFieldValue = hiddenField.val().split(",");
    const hiddenFieldValue = button.parent().parent().next().val().split(",");
    console.log({ hiddenFieldValue });
    console.log({ imageId });
    //console.log(hiddenFieldValue.indexOf(imageId.toString()));
    const i = hiddenFieldValue.indexOf(imageId.toString());

    button.parent().remove();

    // remove certain array element
    if (i != -1) {
      hiddenFieldValue.splice(i, 1);
    }

    // add the IDs to the hidden field value
    hiddenField.val(hiddenFieldValue.join());

    // refresh sortable
    container.sortable("refresh");
  });

  // reordering the images with drag and drop
  $(".misha-gallery").sortable({
    items: "li",
    cursor: "-webkit-grabbing", // mouse cursor
    scrollSensitivity: 40,
    /*
	You can set your custom CSS styles while this element is dragging
	start:function(event,ui){
		ui.item.css({'background-color':'grey'});
	},
	*/
    stop: function (event, ui) {
      ui.item.removeAttr("style");

      let sort = new Array(); // array of image IDs
      const container = $(this); // .misha-gallery

      // each time after dragging we resort our array
      container.find("li").each(function (index) {
        sort.push($(this).attr("data-id"));
      });
      // add the array value to the hidden input field
      container.parent().next().val(sort.join());
      // console.log(sort);
    },
  });
});
