function showCredits() {
  Swal.fire({
    title: 'Credits',
    html: 'This site is made by <br><strong>Benjamin Ipavec</strong>',
    icon: 'info',
    iconColor: '#d4af37', // Sets the default info 'i' icon to your gold accent
    customClass: {
      popup: 'site-swal-popup',
      title: 'site-swal-title',
      htmlContainer: 'site-swal-center',
      confirmButton: 'site-swal-confirm',
      actions: 'site-swal-actions'
    },
    buttonsStyling: false // Crucial: Tells SweetAlert2 to drop its default button styles so yours can take over
  });
}