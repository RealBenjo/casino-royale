# Casino Royale - Dice Game

A luxurious web-based dice game built with PHP, where players compete to achieve the highest score by rolling dice. Experience the thrill of chance with an elegant, casino-inspired interface.

## Features

- **Multiple Players**: Support for up to 3 players per game session
- **Customizable Dice**: Choose between 1-10 dice per game (default: 3)
- **Nickname Only**: Simple player entry with just a nickname
- **Animated Results**: Smooth animations showing dice rolls and scores
- **Podium Display**: Beautiful podium visualization for ranking winners by score
- **Responsive Design**: Works seamlessly on desktop and mobile devices
- **Luxurious UI**: Casino-themed dark theme with gold accents

## Game Flow

1. **Player Entry** (`index.php`): Three players enter their nicknames
2. **Game Configuration** (`play.php`): Select number of dice to roll (1-10)
3. **Results**: Watch animated dice rolls and see individual scores
4. **Podium** (`winners.php`): View ranked winners on a three-tier podium

## How to Play

1. Open `index.php` in your web browser
2. Enter nicknames for each of the three players
3. Click "Roll Dice!"
4. Select the number of dice each player will roll (1-10)
5. Watch the animated dice rolls
6. The results page will automatically display the podium after 10 seconds, or click "Skip to Podium!" to see results immediately
7. Winners are ranked by total score:
   - **Gold Podium**: Highest score (1st place)
   - **Silver Podium**: Second highest score (2nd place)
   - **Bronze Podium**: Third highest score (3rd place)
8. Click "Back to Entry (New Game)" to play again

## Project Structure

```
casino-royale/
├── index.php              # Player nickname entry page
├── play.php               # Game results display
├── winners.php            # Podium and final rankings
├── css/
│   ├── style.css          # Main styling and layout
│   └── classes.css        # Reset styles
├── js/
│   └── play.js            # Dice animation and auto-redirect logic
└── images/
    ├── dice1.gif          # Die showing 1
    ├── dice2.gif          # Die showing 2
    ├── dice3.gif          # Die showing 3
    ├── dice4.gif          # Die showing 4
    ├── dice5.gif          # Die showing 5
    ├── dice6.gif          # Die showing 6
    └── dice-anim.gif      # Animated die (rolls)
```

## Technical Details

### Backend
- **Language**: PHP 7+
- **Session Management**: PHP sessions for game state persistence
- **Dice Rolling**: Random number generation (1-6 per die)
- **Score Calculation**: Sum of all dice values

### Frontend
- **HTML5**: Semantic markup
- **CSS3**: Flexbox layouts, gradients, animations
- **JavaScript**: DOM manipulation and timing

### Color Palette
- **Primary Gold**: #d4af37
- **Light Gold**: #f9e27d
- **Dark Gold**: #aa8c2c
- **Background**: Dark gradient with glassmorphism effect
- **Text**: Light gray (#e0e0e0)

## Requirements

- PHP 5.6+ (7+ recommended)
- Modern web browser with JavaScript enabled
- Local or remote web server (Apache, Nginx, etc.)

## Installation

1. Clone or download the project to your web server's document root
2. Ensure PHP is properly configured on your server
3. Make sure the `images/` directory contains the dice images
4. Navigate to `index.php` in your browser

## Browser Compatibility

- Chrome/Edge: ✅ Full support
- Firefox: ✅ Full support
- Safari: ✅ Full support
- Internet Explorer: ⚠️ Not recommended (CSS animations may not work)

## Features Explanation

### Horizontal Player Form
The player entry form displays three player input fields side-by-side for a clean, modern interface.

### Dice Count Selector
Players can customize the game by choosing 1-10 dice before rolling, allowing for more variety in gameplay.

### Animated Dice Rolls
Real dice GIFs animate during the results phase, creating an engaging visual experience. After 2 seconds, the animated GIFs are replaced with static results showing the final roll values.

### Automatic Podium Display
After 10 seconds, the game automatically transitions to the podium page. Players can skip the wait by clicking "Skip to Podium!"

### Podium Colors
The podium uses realistic medal colors:
- **Gold**: Gradient from #d4af37 to #fdf394 (1st place)
- **Silver**: Gradient from #c0c0c0 to #e8e8e8 (2nd place)
- **Bronze**: Gradient from #b87333 to #a0694a (3rd place)

## Tips

- Use memorable nicknames for easy identification
- The 10-dice option provides the highest score potential
- Players with the same score are both displayed on the same podium tier
- Session data is cleared when starting a new game

## Troubleshooting

**Dice images not showing:**
- Ensure `images/` directory exists in the project root
- Check that dice image files (dice1.gif through dice6.gif) are present
- Verify file permissions allow the web server to read image files

**Session errors:**
- Clear your browser's cookies/cache
- Ensure PHP sessions are enabled on your server
- Check server's `session.save_path` is writable

**Animations not working:**
- Update your browser to the latest version
- Check browser console for JavaScript errors
- Ensure JavaScript is enabled in browser settings

## License

This project is free to use and modify for personal or commercial purposes.

## Author

Created as a fun dice game web application with a casino aesthetic.
