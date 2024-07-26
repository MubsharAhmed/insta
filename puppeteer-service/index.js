const express = require('express');
const puppeteer = require('puppeteer');

const app = express();
const PORT = process.env.PORT || 3000;

app.get('/scrape', async (req, res) => {
    const { url } = req.query;

    if (!url) {
        return res.status(400).json({ error: 'URL parameter is required' });
    }

    try {
        const browser = await puppeteer.launch();
        const page = await browser.newPage();
        await page.goto(url, { waitUntil: 'networkidle2' });

        // Wait for the necessary elements to load
        await page.waitForSelector('meta[property="og:description"]');
        await page.waitForSelector('meta[property="og:image"]');

        const data = await page.evaluate(() => {
            const description = document.querySelector('meta[property="og:description"]').getAttribute('content');
            const title = document.querySelector('meta[property="og:title"]').getAttribute('content');
            const image = document.querySelector('meta[property="og:image"]').getAttribute('content');
            const links = Array.from(document.querySelectorAll('a')).map(a => a.href);
            
            const [followers, following, posts] = description.match(/(\d+)\sFollowers,\s(\d+)\sFollowing,\s(\d+)\sPosts/).slice(1);

            return {
                followers,
                following,
                posts,
                title,
                image,
                links
            };
        });

        await browser.close();
        res.json(data);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
