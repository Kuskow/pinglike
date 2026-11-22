document.addEventListener('click', function(e) {
    const btn = e.target.closest('.pinglike-btn');
    if (!btn) {
        return;
    }

    e.preventDefault();

    if (btn.dataset.liked === '1') {
        return;
    }

    btn.dataset.liked = '1';
    btn.classList.add('is-liked');

    const urlObj = new URL(btn.href);
    const hash = urlObj.searchParams.get('hash') || '';
    urlObj.searchParams.delete('hash');

    const bodyData = new URLSearchParams();
    bodyData.append('hash', hash);

    fetch(urlObj.toString(), {
        method: 'POST',
        body: bodyData,
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    }).catch(() => {});
});

