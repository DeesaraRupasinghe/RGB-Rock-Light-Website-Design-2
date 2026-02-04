import { ShoppingCart, Heart, Share2 } from "lucide-react";

export function CallToAction() {
  return (
    <section className="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-black to-gray-900">
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 sm:mb-6 px-4">
          Ready to Light Up Your Ride?
        </h2>
        <p className="text-base sm:text-lg md:text-xl text-gray-400 mb-8 sm:mb-10 md:mb-12 px-4">
          Transform your vehicle with professional-grade RGB
          rock lights. Easy installation, stunning results.
        </p>

        <div className="bg-gradient-to-br from-white/10 to-white/5 border border-white/20 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 mb-6 sm:mb-7 md:mb-8">
          <div className="flex flex-col md:flex-row items-center justify-between gap-5 sm:gap-6">
            <div className="text-center md:text-left w-full md:w-auto">
              <div className="text-xs sm:text-sm text-gray-400 mb-1">
                Special Offer
              </div>
              <div className="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-1 sm:mb-2">
                <span className="line-through text-gray-500 text-xl sm:text-2xl mr-2 sm:mr-3">
                  $149.99
                </span>
                $99.99
              </div>
              <div className="text-green-400 text-xs sm:text-sm">
                Save $50 - Limited Time Only!
              </div>
            </div>

            <div className="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full md:w-auto">
              <button className="w-full sm:w-auto bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg flex items-center justify-center gap-2 transition-all transform hover:scale-105 shadow-lg shadow-purple-500/30">
                <ShoppingCart className="w-4 h-4 sm:w-5 sm:h-5" />
                Add to Cart
              </button>
              <div className="flex gap-3 sm:gap-4">
                <button className="flex-1 sm:flex-none bg-white/10 hover:bg-white/20 text-white px-5 sm:px-6 py-3 sm:py-4 rounded-lg border border-white/20 transition-all flex items-center justify-center">
                  <Heart className="w-4 h-4 sm:w-5 sm:h-5" />
                </button>
                <button className="flex-1 sm:flex-none bg-white/10 hover:bg-white/20 text-white px-5 sm:px-6 py-3 sm:py-4 rounded-lg border border-white/20 transition-all flex items-center justify-center">
                  <Share2 className="w-4 h-4 sm:w-5 sm:h-5" />
                </button>
              </div>
            </div>
          </div>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 text-xs sm:text-sm text-gray-400">
          <div className="flex items-center justify-center gap-1 sm:gap-2">
            <span>✓</span>
            <span>Free Shipping</span>
          </div>
          <div className="flex items-center justify-center gap-1 sm:gap-2">
            <span>✓</span>
            <span>2-Year Warranty</span>
          </div>
          <div className="flex items-center justify-center gap-1 sm:gap-2">
            <span>✓</span>
            <span>30-Day Returns</span>
          </div>
          <div className="flex items-center justify-center gap-1 sm:gap-2">
            <span>✓</span>
            <span>24/7 Support</span>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 pt-12 border-t border-white/10">
        <div className="text-center text-gray-500 text-sm">
          <p>
            &copy; 2026 RGB Rock Lights. All rights reserved.
          </p>
        </div>
      </footer>
    </section>
  );
}