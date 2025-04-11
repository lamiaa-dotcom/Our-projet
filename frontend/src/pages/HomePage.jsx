import Header from '../components/Header';
import Hero from '../components/Hero';
import ProductGrid from '../components/ProductGrid';
import ValuesSection from '../components/ValuesSection';
import Footer from '../components/Footer';

function HomePage() {
  return (
    <div className="font-sans">
      <Header />
      <Hero />
      <ProductGrid />
      <ValuesSection />
      <Footer />
    </div>
  );
}

export default HomePage;