export default function (el) {
  const counters = el.querySelectorAll('[data-ref="counter"]')
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches

  counters.forEach(counter => {
    if (!counter.dataset.counterRaw) {
      counter.dataset.counterRaw = counter.textContent.trim()
    }
  })

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return

      const target = entry.target
      if (target.dataset.counterRunning === 'true') return

      target.dataset.counterRunning = 'true'

      const isEnabled = target.dataset.counterEnabled !== 'false'
      const raw = target.dataset.counterRaw || target.textContent.trim()
      const match = raw.match(/^([^\d+-]*)([\d.,]+)([^\d]*)$/)

      if (!match || !isEnabled || prefersReduced) {
        target.dataset.counterRunning = 'false'
        return
      }

      const [_, prefix, numStr, suffix] = match
      const targetValue = parseFloat(numStr.replace(/,/g, ''))
      const decimals = (numStr.split('.')[1] || []).length
      const duration = parseInt(target.dataset.counterDuration) || 2000

      animate(0, targetValue, duration, (val) => {
        const formatted = val.toLocaleString(undefined, {
          minimumFractionDigits: decimals,
          maximumFractionDigits: decimals
        })
        target.textContent = `${prefix}${formatted}${suffix}`
        if (val === targetValue) {
          target.dataset.counterRunning = 'false'
        }
      })
    })

    entries.forEach(entry => {
      if (entry.isIntersecting) return

      const target = entry.target
      if (target.dataset.counterRunning === 'true') return

      if (target.dataset.counterRaw) {
        target.textContent = target.dataset.counterRaw
      }
    })
  }, { threshold: 0.35 })

  counters.forEach(c => observer.observe(c))
}

function animate(startValue, endValue, duration, callback) {
  let startTimestamp = null
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp
    const progress = Math.min((timestamp - startTimestamp) / duration, 1)
    const eased = 1 - Math.pow(1 - progress, 3)

    callback(startValue + eased * (endValue - startValue))

    if (progress < 1) {
      window.requestAnimationFrame(step)
    }
  }
  window.requestAnimationFrame(step)
}
