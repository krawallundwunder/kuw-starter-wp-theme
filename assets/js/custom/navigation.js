function mobileMenu() {
	return {
		show: false,
		toggle() {
			this.show = ! this.show;
			document.body.classList.toggle( 'no-scroll' );
		},
		isOpen() {
			return true === this.show;
		}
	};
}
