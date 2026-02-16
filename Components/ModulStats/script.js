export default function (el) {
  const counters = el.querySelectorAll('[data-ref="counter"]')
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return

      const target = entry.target
      observer.unobserve(target)

      const isEnabled = target.dataset.counterEnabled !== 'false'
      const raw = target.textContent.trim()
      const match = raw.match(/^([^\d+-]*)([\d.,]+)([^\d]*)$/)

      if (!match || !isEnabled || prefersReduced) return

      const [_, prefix, numStr, suffix] = match
      const targetValue = parseFloat(numStr.replace(/,/g, ''))
      const decimals = (numStr.split('.')[1] || []).length
      const duration = parseInt(target.dataset.counterDuration) || 2000

      animate(target, 0, targetValue, duration, (val) => {
        const formatted = val.toLocaleString(undefined, {
          minimumFractionDigits: decimals,
          maximumFractionDigits: decimals
        })
        target.textContent = `${prefix}${formatted}${suffix}`
      })
    })
  }, { threshold: 0.35 })

  counters.forEach(c => observer.observe(c))
}

function animate(start, end, duration, callback) {
  let startTimestamp = null
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp
    const progress = Math.min((timestamp - startTimestamp) / duration, 1)
    const eased = 1 - Math.pow(1 - progress, 3)

    callback(start + eased * (end - start))

    if (progress < 1) {
      window.requestAnimationFrame(step)
    }
  }
  window.requestAnimationFrame(step)
}
