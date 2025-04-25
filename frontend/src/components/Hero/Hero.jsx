import React from 'react';
import './Hero.css';
import heroBg from '../../assets/images/hero-bg.jpg';

const Hero = () => {
  return (
    <section className="hero" style={{ backgroundImage: `url(${heroBg})` }}>
      <div className="hero-overlay">
        <div className="hero-content">
          <h1>Naturellement Vôtre</h1>
          <p>Découvrez des produits bio certifiés pour votre bien-être</p>
          <button className="cta-button">Explorer</button>
        </div>
      </div>
    </section>
  );
};

export default Hero;