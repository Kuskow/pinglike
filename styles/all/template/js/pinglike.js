document.addEventListener('click', (e) => {
	const btn = e.target.closest('.pinglike-btn');
	if (!btn) return;

	e.preventDefault();
	if (btn.dataset.liked) return;

	btn.dataset.liked = '1';
	btn.classList.add('is-liked');

	const url = new URL(btn.href);
	const hash = url.searchParams.get('hash') || '';
	url.searchParams.delete('hash');

	fetch(url, {
		method: 'POST',
		body: new URLSearchParams({ hash }),
		headers: { 'X-Requested-With': 'XMLHttpRequest' }
	}).catch(() => {});
});

