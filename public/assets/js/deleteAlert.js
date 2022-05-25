/*
$('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "Once deleted, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
            else {
              swal("Your record is safe!");
            }
          });
      }); */

$('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "Once deleted, it will be gone forever.",
              icon: "warning",
              buttons: ["Cancel", "Yes"],
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });


$('.confirm_approve').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `You are about to Approve this record.`,
              text: "Are you sure?",
              icon: "warning",
              buttons: ["Cancel", "Yes"],
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

$('.confirm_reject').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `You are about to Reject this record.`,
              text: "Are you sure?",
              icon: "warning",
              buttons: ["Cancel", "Yes"],
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

$('.confirm_approve1').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `You are about to Approve this record.`,
              text: "Are you sure?",
              icon: "warning",
              buttons: ["Cancel", "Yes"],
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

$('.confirm_reject1').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `You are about to Reject this record.`,
              text: "Are you sure?",
              icon: "warning",
              buttons: ["Cancel", "Yes"],
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });