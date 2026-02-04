import { Hero } from './components/Hero';
import { Features } from './components/Features';
import { Applications } from './components/Applications';
import { ProductInfo } from './components/ProductInfo';
import { InstallationEffect } from './components/InstallationEffect';
import { CallToAction } from './components/CallToAction';

export default function App() {
  return (
    <div className="min-h-screen bg-black">
      <Hero />
      <Features />
      <Applications />
      <ProductInfo />
      <InstallationEffect />
      <CallToAction />
    </div>
  );
}
